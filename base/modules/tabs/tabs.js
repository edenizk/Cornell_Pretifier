import { on, select, selectAll, removeClass, addClass, getModuleOptions, hasClass, getData, setStyle, toggleClass } from 'lib/dom'
import { map, makeArray } from 'lib/utils'
import throttle from 'lodash.throttle'

const MODULE_NAME = 'tabs'

export default function (el) {
  const defaults = {
    headerSelector: '.js-toggle',
    headerMobileSelector: '.js-mobile-toggle',
    contentSelector: '.js-content',
    themeSelector: '.js-theme',
    listSelector: '.js-list',
    headerWrapperSelector: '.js-header',
    border: '.js-border',
    modalControl: '.js-modal-toggle',
    buttonClose: '.js-close',
    headerClass: 'is-toggle-active',
    contentClass: 'is-content-active',
    themeClass: 'theme-grid--activate',
    modalClass: 'tab-horizontal__header-activate'
  }

  const args = getModuleOptions(MODULE_NAME, el, defaults)
  const toggles = selectAll(args.headerSelector)
  const mobileToggles = selectAll(args.headerMobileSelector)
  const themes = selectAll(args.themeSelector)
  const contentList = selectAll(args.contentSelector)
  const themeList = select(args.listSelector)
  const border = select(args.border)
  const header = select(args.headerWrapperSelector)
  const closeButton = selectAll(args.buttonClose)
  const descriptionList = select('.js-content-list', el)
  const modalButton = select(args.modalControl)

  if (toggles && contentList) {
    const resetHeight = (t) => {
      t.style.maxHeight = 0
    }
    const resetItemsHeight = (arr) => {
      map((t) => {
        resetHeight(t)
      }, arr)
    }
    const reset = () => {
      map(removeClass(args.headerClass), toggles)
      map(removeClass(args.headerClass), mobileToggles)
      map(removeClass(args.contentClass), contentList)
      map(removeClass(args.themeClass), themes)
      if (themes) {
        resetItemsHeight(themes)
      }
      if (contentList) {
        resetItemsHeight(contentList)
      }
    }
    const setBorderColor = (color) => setStyle('background', color, border)
    const setBacground = (color, i) => {
      i.setAttribute('data-background-color', color)
      setStyle('background', color, i)
    }
    const isActivateItem = (index) => hasClass(args.headerClass, toggles[index])
    const activate = (index, t) => {
      if (index >= 0 && t) {
        addClass(args.headerClass, toggles[index])
        addClass(args.headerClass, mobileToggles[index])
        addClass(args.contentClass, contentList[index])
        addClass(args.themeClass, t)

        if (!hasClass(args.themeClass, t)) {
          themeList.style.maxHeight = 0
        } else {
          themeList.style.minHeight = t.scrollHeight - 150 + 'px'
          t.style.maxHeight = t.scrollHeight + 'px'
        }
        if (!hasClass(args.contentClass, contentList[index])) {
          contentList[index].style.maxHeight = 0
        } else {
          descriptionList.style.height = contentList[index].scrollHeight + 'px'
          contentList[index].style.minHeight = contentList[index].scrollHeight + 'px'
        }
      }
    }
    // Activate first item on load
    const t0 = select('[data-theme="0"]', el)
    on('load', () => {
      reset()
      if (t0) {
        const color = getData('color', toggles[0])
        activate(0, t0)
        const t = select('[data-theme="0"]', el)
        if (color && border) {
          setBorderColor(color)
        }
        const background = select('.js-background', t)
        if (background && color) {
          setBacground(color, background)
        }
      }
    }, window)
    on('click', function (e) {
      e.preventDefault()
      const color = getData('color', this)
      console.log(this)
      const itemsArray = makeArray(this.parentElement.children)
      const itemIndex = itemsArray.indexOf(this)
      const t = select('[data-theme="' + itemIndex + '"]', el)
      if (!isActivateItem(itemIndex)) {
        reset()
        activate(itemIndex, t)
      }
      if (color && border) {
        setBorderColor(color)
      }
      const background = select('.js-background', t)
      if (background && color) {
        setBacground(color, background)
      }
      if (hasClass(args.modalClass, header)) {
        removeClass(args.modalClass, header)
      }
    }, toggles)
    on('click', function (e) {
      toggleClass(args.modalClass, header)
    }, modalButton)
    on('click', () => {
      removeClass(args.modalClass, header)
    }, closeButton)
    on('resize', throttle(function () {
      const t = select('.theme-grid--activate', el)
      const contentActivate = select('.is-content-active', el)
      if (t) {
        if (!hasClass(args.themeClass)) {
          themeList.style.maxHeight = 0
        } else {
          t.style.maxHeight = t.scrollHeight + 'px'
          themeList.style.minHeight = t.scrollHeight + 'px'
        }
        if (!hasClass(args.contentClass)) {
          contentActivate.style.maxHeight = 0
        } else {
          contentActivate.style.maxHeight = contentActivate.scrollHeight + 'px'
          descriptionList.style.height = contentActivate.scrollHeight + 'px'
          if (window.matchMedia('(max-width: 980px)')) {
            setStyle('min-height', contentActivate.scrollHeight + 'px', header)
          }
        }
      }
    }, 200), window)

    let debounceTimer

    const debounce = (func, delay) => {
      if (debounceTimer) {
        clearTimeout(debounceTimer)
      }

      debounceTimer = setTimeout(func, delay)
    }

    on('resize', () => {
      if (!el.getAttribute('data-resizing')) {
        el.setAttribute('data-resizing', true)
      }

      debounce(() => {
        if (el.getAttribute('data-resizing')) {
          el.removeAttribute('data-resizing')
        }
      }, 200)
    }, window)
  }
}
