import { select, selectAll, on, toggleClass, hasClass, addClass, removeClass, setStyle, getModuleOptions } from 'lib/dom'
import { map } from 'lib/utils'
import throttle from 'lodash.throttle'

const MODULE_NAME = 'company-filter'

export default (el) => {
  const defaults = {
    new_layout: false
  }
  const args = getModuleOptions(MODULE_NAME, el, defaults)
  const toggle = select('.js-block-toggle', el)
  const toggleContent = select('.js-block-content', el)
  const contentEls = selectAll('.js-content', el)
  const BREAKPOINT = 740
  const BREAK_POINT_MOBILE = 799
  const ELEMENT_CLASS = 'is-active'
  const BLOCK_CONTENT_CLASS = 'company-filter__block--active'
  const BLOCK_WRAPPER_CONTENT_CLASS = 'company-filter__wrapper--active'
  const INNER_SELECTOR = '.js-company-filter-inner'
  const toggleLabel = select('.js-company-filter-label', el)
  const innerEl = select(INNER_SELECTOR, el)
  const toggleLabelContent = select('.js-company-filter-inner', el)
  const contentWrapper = select('.js-company-filter-wrapper', el)
  if (!args.new_layout) {
    const updateContentElsHeight = () => {
      if (hasClass(BLOCK_CONTENT_CLASS, toggleContent)) {
        map((contentEl) => {
          addClass(ELEMENT_CLASS, contentEl)
          setStyle('max-height', contentEl.scrollHeight + 'px', contentEl)
        }, contentEls)
      } else {
        map((contentEl) => {
          removeClass(ELEMENT_CLASS, contentEl)
          setStyle('max-height', 0, contentEl)
        }, contentEls)
      }
    }
    if (toggle && toggleContent) {
      if (window.innerWidth > BREAKPOINT) {
        updateContentElsHeight()
        on('click', () => {
          toggleClass(BLOCK_CONTENT_CLASS, toggleContent)
          updateContentElsHeight()
        }, toggle)
      }
    }
  } else {
    const updateLabelContentHeight = () => {
      if (hasClass(BLOCK_WRAPPER_CONTENT_CLASS, contentWrapper)) {
        setStyle('max-height', toggleLabelContent.scrollHeight + 'px', toggleLabelContent)
        on('resize', throttle(() => {
          if (window.innerWidth > BREAKPOINT) {
            setStyle('max-height', '100%', innerEl)
          }
        }, 250), window)
      } else {
        setStyle('max-height', 0, toggleLabelContent)
      }
    }
    if (window.innerWidth <= BREAK_POINT_MOBILE) {
      updateLabelContentHeight()
      on('click', () => {
        toggleClass(BLOCK_WRAPPER_CONTENT_CLASS, contentWrapper)
        updateLabelContentHeight()
      }, toggleLabel)
    }
  }
}
