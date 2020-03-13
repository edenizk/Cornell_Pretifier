import Flickity from 'flickity-sync'
import { getModuleOptions, on, select, hasClass, getData, addClass, removeClass, selectAll, closest } from 'lib/dom'
import throttle from 'lodash.throttle'

const MODULE_NAME = 'carousel'
const INIT_CLASS = 'is-initialized'
const HIDE_CLASS = 'carousel--hide-button'
const GALLERY_CAROUSEL_CLASS = 'js-gallery-carousel'
const CAROUSEL_ITEM_ANIMATION_CLASS = 'carousel-item--animation'

Flickity.prototype.hasDragStarted = function (moveVector) {
  // start dragging after pointer has moved 3 pixels in either direction
  return !this.isTouchScrolling && Math.abs(moveVector.x) > 3
}

export default (el) => {
  const defaults = {
    prevNextButtons: true,
    pageDots: true,
    cellAlign: 'center',
    percentPosition: false,
    items: 1,
    watchCSS: false,
    arrowShape: 'M35 55l-5-5 5-5 30-30c3-3 3-7 0-10s-7-3-10 0L15 45c-3 3-3 7 0 10l40 40c3 3 7 3 10 0s3-7 0-10L35 55z',
    on: {
      ready: function () {
        addClass(INIT_CLASS, el)
      }
    }
  }
  const args = getModuleOptions(MODULE_NAME, el, defaults)

  // sync slider
  if (args.sync) {
    const parent = closest('.js-hero', el)
    if (parent) {
      args.sync = select(args.sync, parent)
    }
  }
  if (el.childElementCount > args.items) {
    const flickity = new Flickity(el, args)
    const resize = () => addClass(INIT_CLASS, el)
    const reset = () => removeClass(INIT_CLASS, el)
    const handler = () => {
      reset()
      flickity.resize()
      resize()
    }
    if (getData('initialize', el)) {
      resize()
      on('resize', handler, window)
      on('load', handler, window)
    }

    // Jacob's Institute Module slider
    flickity.on('select', (index) => {
      if (flickity.selectedElement) {
        removeClass('flickity-item--previous', flickity.selectedElement)
        if (flickity.selectedElement.previousElementSibling) {
          addClass('flickity-item--previous', flickity.selectedElement.previousElementSibling)
        }
      }
      // Media Features Module
      if (el.hasAttribute('data-show-order')) {
        const currentIndex = ++index
        const selectIndexEl = select('.js-index', el.parentNode)
        if (selectIndexEl) {
          selectIndexEl.innerHTML = currentIndex
        }
      }
    })
    // Media Features Module
    if (el.hasAttribute('data-show-order')) {
      const listItems = selectAll('.js-item', el)
      const totalEl = select('.js-total', el.parentNode)
      if (totalEl) {
        totalEl.innerHTML = listItems.length
      }
    }

    // Event for galley carousel
    if (hasClass(GALLERY_CAROUSEL_CLASS, el) && flickity) {
      const selectedIndex = flickity.selectedIndex
      if (flickity.cells[selectedIndex].element) {
        addClass(CAROUSEL_ITEM_ANIMATION_CLASS, flickity.cells[selectedIndex].element)
      }
      flickity.on('change', function (index) {
        const itemAnimation = select('.' + CAROUSEL_ITEM_ANIMATION_CLASS, el)
        if (itemAnimation) {
          removeClass(CAROUSEL_ITEM_ANIMATION_CLASS, itemAnimation)
        }
        if (flickity.cells[selectedIndex].element) {
          addClass(CAROUSEL_ITEM_ANIMATION_CLASS, flickity.cells[index].element)
        }
      })
    }

    // Hide carousel arrows when we do not have enough items
    const checkCarouselButtons = () => {
      if ((flickity.cells && flickity.selectedCells) && (flickity.cells.length <= flickity.selectedCells.length)) {
        addClass(HIDE_CLASS, el)
      } else {
        removeClass(HIDE_CLASS, el)
      }
    }
    checkCarouselButtons()
    on('resize', throttle(checkCarouselButtons, 100), window)
  }
}
