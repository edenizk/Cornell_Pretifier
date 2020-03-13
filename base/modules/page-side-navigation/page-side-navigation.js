import throttle from 'lodash.throttle'
import { addClass, getHeight, on, select, selectAll, setAttribute, setStyle, toggleClass } from 'lib/dom'

const CURRENT_PAGE_SELECTOR = '.js-current-page'
const LIST_SELECTOR = '.js-list'
const OPEN_CLASS = 'current_page_ancestor'
const ITEM_HAS_CHILD_SELECTOR = '.page_item_has_children'
const ICON_SELECTOR = '.js-side-nav-icon'
const SIDEBAR_SELECTOR = '.js-block-left'
const CONTENT_SELECTOR = '.js-block-right'
const INNER_SELECTOR = '.js-inner'
const LOADED_CLASS = 'is-loaded'

export default function (el) {
  const currentPage = select(CURRENT_PAGE_SELECTOR, el)
  const listEl = select(LIST_SELECTOR, el)
  const moduleInnerEl = select(INNER_SELECTOR, el)

  if (currentPage && listEl) {
    on('click', () => {
      toggleClass(OPEN_CLASS, currentPage)
      toggleClass(OPEN_CLASS, listEl)
    }, currentPage)

    /* Need to select directly bc this is generated from WP function - no touching it */
    const listHasChildEl = selectAll(ITEM_HAS_CHILD_SELECTOR, listEl)
    if (listHasChildEl.length) {
      listHasChildEl.map(item => {
        const icon = select(ICON_SELECTOR, item)
        if (icon) {
          on('click', (e) => {
            e.preventDefault()
            toggleClass(OPEN_CLASS, item)
            setAttribute('is-activated', true, item)
            setMinimumSidebarHeight()
          }, icon)
        }
      })
    }
  }

  const setMinimumSidebarHeight = () => {
    const sideBarEl = select(SIDEBAR_SELECTOR, el)
    const contentEl = select(CONTENT_SELECTOR, el)
    if (sideBarEl && contentEl && moduleInnerEl) {
      const contentHeight = getHeight(contentEl)
      const sideBarHeight = getHeight(sideBarEl)
      if (contentHeight < sideBarHeight) {
        setStyle('min-height', `${sideBarHeight}px`, moduleInnerEl)
      } else {
        setStyle('min-height', 'auto', moduleInnerEl)
      }
      addClass(LOADED_CLASS, el)
    }
  }
  setMinimumSidebarHeight()
  on('resize', throttle(setMinimumSidebarHeight, 200), window)
  on('load', setMinimumSidebarHeight, window)
}
