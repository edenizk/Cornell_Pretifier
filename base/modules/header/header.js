import {
  on,
  select,
  selectAll,
  toggleClass,
  removeClass,
  onFocus,
  onEscape,
  getData,
  scrollTop
} from 'lib/dom'

import { map } from 'lib/utils'

const SLIDEOUT_SELECTOR = '.js-slideout'
const ACTIVATE_CLASS = 'slideout-activate'

const getScrollY = () =>
  window.scrollY ||
  window.pageYOffset ||
  document.body.scrollTop ||
  document.documentElement.scrollTop ||
  0

const isTouch = () =>
  document.body.classList.contains('is-touch')

const isSticky = () =>
  document.documentElement
    .getAttribute('data-sticky-header') === 'true'

const isSlideoutActive = () =>
  document.documentElement
    .classList.contains(ACTIVATE_CLASS)

const toggleSlideout = () => {
  const isActive = isSlideoutActive()

  if (!isActive) {
    const scrollY = getScrollY()

    document.documentElement
      .setAttribute('data-scrollY-restore', scrollY)

    toggleClass(ACTIVATE_CLASS, document.documentElement)

    window.scrollTo(0, scrollY)
  }

  if (isActive) {
    toggleClass(ACTIVATE_CLASS, document.documentElement)

    const scrollY = Number(document.documentElement
      .getAttribute('data-scrollY-restore') || '0') || 0

    window
      .scrollTo(0, scrollY)

    document.documentElement
      .removeAttribute('data-scrollY-restore')
  }
}

export default function (el) {
  if (window.getComputedStyle(el).position === 'fixed') {
    document.documentElement.setAttribute('data-sticky-header', true)
  }

  const slideoutToggles = selectAll('[data-slideout-toggle]', el)
  const slideoutEl = select(SLIDEOUT_SELECTOR)
  const slideoutOverlay = el.querySelector('.slideout-overlay')

  const scrollbarWidth = Number(document.documentElement
    .getAttribute('data-scrollbar-width') || '0')

  if (slideoutToggles.length && slideoutEl) {
    if (scrollbarWidth) {
      const style = document.createElement('style')

      style.innerHTML = `
        html.${ACTIVATE_CLASS} main > *,
        html.${ACTIVATE_CLASS} footer {
          padding-right: ${scrollbarWidth}px;
        }
      `

      document.querySelector('head')
        .appendChild(style)
    }

    slideoutToggles
      .forEach(slideoutToggle =>
        on('click', () => {
          const onToggleSlideout = () => {
            toggleSlideout()

            slideoutToggles
              .forEach(toggle => {
                const classRemove = getData('remove-class', toggle)
                const classRemoveTarget = getData('remove-class-target',
                  toggle) || document.documentElement

                if (classRemove) {
                  removeClass(classRemove, select(classRemoveTarget, el))
                }

                toggle.setAttribute('aria-expanded', isSlideoutActive())
              })
          }

          return isSticky()
            ? onToggleSlideout()
            : scrollTop(0, () => onToggleSlideout(), undefined, 500)
        }, slideoutToggle))

    if (slideoutOverlay) {
      slideoutOverlay
        .addEventListener('click', () => {
          if (!isSlideoutActive() || !slideoutToggles[0]) {
            return
          }

          slideoutToggles[0].click()
        })
    }
  }

  const searchButton = select('.header__button-search')
  const isSearchButtonExpanded = () =>
    searchButton &&
    searchButton.getAttribute('aria-expanded') === 'true' &&
    window.getComputedStyle(searchButton).display !== 'none'

  const setActiveMenuItem = (item) => {
    const getSubMenu = (menuItem) => menuItem
      ? menuItem.querySelector('.sub-menu')
      : null

    const getAnchor = (menuItem) => menuItem.firstElementChild &&
        menuItem.firstElementChild.tagName.match(/^a$/i)
      ? menuItem.firstElementChild
      : null

    if (item &&
        (item.classList.contains('active') ||
        !getSubMenu(item) ||
        !getAnchor(item))) {
      return
    }

    Array.from(el.querySelectorAll('.menu-item.active'))
      .forEach(_item => {
        _item.classList.remove('active')

        if (getSubMenu(_item)) {
          getSubMenu(_item)
            .setAttribute('aria-hidden', true)
        }

        if (isTouch()) {
          _item.dataset.clicks = 0
        }
      })

    if (!item) {
      return
    }

    if (searchButton && isSearchButtonExpanded()) {
      searchButton.click()
      searchButton.blur()
    }

    item.classList.add('active')

    getSubMenu(item)
      .setAttribute('aria-hidden', false)
  }

  el.addEventListener('mouseleave', () => {
    const activeMenuItem = el
      .querySelector('#menu-main-navigation > .menu-item.active')

    if (!activeMenuItem || activeMenuItem.contains(document.activeElement)) {
      return
    }

    setActiveMenuItem()
  })

  // Add sub menu toggle on focus
  const subMenuItems = selectAll('#menu-main-navigation > .menu-item', el)
  map((item) => {
    item
      .addEventListener('mouseleave', () => {
        if (item.contains(document.activeElement)) {
          return
        }

        setActiveMenuItem()
      })

    const primaryAnchor = item.firstElementChild &&
        item.firstElementChild.tagName.match(/^a$/i)
      ? item.firstElementChild
      : null

    if (primaryAnchor) {
      primaryAnchor
        .addEventListener('mouseover', () =>
          setActiveMenuItem(item))
    }

    Array.from(item.querySelectorAll('a'))
      .forEach(anchor => anchor
        .addEventListener('blur', () => setTimeout(() =>
          setActiveMenuItem(item.contains(document.activeElement)
            ? item
            : null), 1)))

    if (primaryAnchor) {
      primaryAnchor
        .addEventListener('focus', () => setTimeout(() =>
          setActiveMenuItem(item), 1))
    }

    if (item.querySelector('.sub-menu')) {
      const positionSubMenu = () => {
        const subMenu = item.querySelector('.sub-menu')

        if (!subMenu) {
          return
        }

        subMenu.style.marginLeft = ''
        subMenu.style.transition = 'none'

        if (window.navigator.userAgent.match(/trident/i)) {
          const itemBounds = item.getBoundingClientRect()
          const listBounds = item.parentElement.getBoundingClientRect()
          subMenu.style.left = `${itemBounds.left - listBounds.left}px`
        }

        const bounds = subMenu.getBoundingClientRect()

        const offsetRight = window.innerWidth - (bounds.right || 0)

        const minOffset = 30

        if (offsetRight >= minOffset) {
          subMenu.style.transition = ''
          return
        }

        const submenuMarginLeft = Number(window.getComputedStyle(subMenu)
          .marginLeft.replace(/px/, '') || '0')

        subMenu.style.marginLeft =
          `${(minOffset * -1) +
            offsetRight +
            submenuMarginLeft +
            (scrollbarWidth * -1)}px`

        setTimeout(() => {
          subMenu.style.transition = ''
        }, 17)
      }

      positionSubMenu()

      window
        .addEventListener('resize', positionSubMenu)
    }

    if (!isTouch() || !item.querySelector('.sub-menu')) {
      return
    }

    item.dataset.clicks = 0

    item
      .addEventListener('click', (e) => {
        if (item.dataset.clicks <= 0) {
          e.preventDefault()
          setActiveMenuItem(item)
        }

        item.dataset.clicks++
      })
  }, subMenuItems)

  if (searchButton) {
    searchButton
      .addEventListener('click', () => setTimeout(() => {
        const controls = searchButton.getAttribute('aria-controls')
          ? document
            .querySelector(`#${searchButton.getAttribute('aria-controls')}`)
          : null

        if (!controls) {
          return
        }

        searchButton
          .setAttribute('aria-expanded', controls.classList.contains('is-active'))
      }, 17))

    onFocus(searchButton, searchButton => setActiveMenuItem())
  }

  onEscape(document.body, () => {
    setActiveMenuItem()

    if (isSearchButtonExpanded()) {
      searchButton.click()
    }
  })

  if (el.getAttribute('data-hero') !== 'true' || !isSticky()) {
    return
  }

  const toggleTransparency = () => {
    const isTransparent = el.getAttribute('data-transparent') === 'true'

    if (isTransparent && getScrollY() >= 1) {
      el.setAttribute('data-transparent', false)
    }

    if (!isTransparent && getScrollY() < 1) {
      el.setAttribute('data-transparent', true)
    }
  }

  toggleTransparency()

  window
    .addEventListener('scroll', toggleTransparency, false)

  window
    .addEventListener('resize', toggleTransparency)
}
