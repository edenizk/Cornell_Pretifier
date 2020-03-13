import { on, select, removeClass, addClass, setAttribute, getAttribute, getHeight, setStyle } from 'lib/dom'
import throttle from 'lodash.throttle'

const COMPANY_ITEM_CONTENT_SELECTOR = '.js-content-wrapper'
const COMPANY_ITEM_CONTENT_INNER_SELECTOR = '.js-content-inner'
const COMPANY_ITEM_ACTIVE_CLASS = 'company-list-item--active'
const BREAKPOINT = 980

export default (el) => {
  const hoverCard = () => {
    const hoverCardItem = () => {
      const clientWidth = window.innerWidth
      const companyItemContentEl = select(COMPANY_ITEM_CONTENT_SELECTOR, el)
      if (companyItemContentEl) {
        const height = getAttribute('data-height', companyItemContentEl)
        if (clientWidth >= BREAKPOINT) {
          addClass(COMPANY_ITEM_ACTIVE_CLASS, el)
        }
        setStyle('maxHeight', height, companyItemContentEl)
      }
    }

    const unHoverCardItem = () => {
      const clientWidth = window.innerWidth
      const companyItemContentEl = select(COMPANY_ITEM_CONTENT_SELECTOR, el)
      if (companyItemContentEl) {
        const height = getAttribute('data-height', companyItemContentEl)
        if (clientWidth >= BREAKPOINT) {
          removeClass(COMPANY_ITEM_ACTIVE_CLASS, el)
          setStyle('maxHeight', 0, companyItemContentEl)
        } else {
          setStyle('maxHeight', height, companyItemContentEl)
        }
      }
    }

    const updateHeightOnResize = () => {
      const companyItemContentEl = select(COMPANY_ITEM_CONTENT_SELECTOR, el)
      const height = getAttribute('data-height', companyItemContentEl)
      if (companyItemContentEl) {
        setStyle('maxHeight', height, companyItemContentEl)
        removeClass(COMPANY_ITEM_ACTIVE_CLASS, el)
      }
    }

    const contentWrapperEl = select(COMPANY_ITEM_CONTENT_SELECTOR, el)
    const contentInnerEl = select(COMPANY_ITEM_CONTENT_INNER_SELECTOR, el)

    if (contentWrapperEl && contentInnerEl) {
      const maxHeight = getHeight(contentInnerEl)
      setAttribute('data-height', `${maxHeight}px`, contentWrapperEl)
      updateHeightOnResize()
    }

    on('mouseover', hoverCardItem, el)
    on('mouseleave', unHoverCardItem, el)
  }
  hoverCard()
  on('resize', throttle(hoverCard, 200), window)
}
