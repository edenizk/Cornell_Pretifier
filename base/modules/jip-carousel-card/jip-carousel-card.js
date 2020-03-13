import {
  on,
  select,
  selectAll,
  addClass,
  removeClass,
  hasClass,
  getModuleOptions,
  setStyle,
  getHeight,
  getWidth, getData
} from 'lib/dom'
import { map, partial, pipe } from 'lib/utils'
import Flickity from 'flickity-sync'
import throttle from 'lodash.throttle'

const MODULE_NAME = 'js-carousel-card'
const CARD_TITLE_SELECTOR = '.js-jip-card-title'
const CAROUSEL_SELECTOR = '.js-jip-carousel'
const CARD_CTA_SELECTOR = '.js-jip-card-ctas'
const CARD_IMAGE_SELECTOR = '.js-card-image'

export default function (el) {
  const defaults = {
    item: '.js-jip-card__item',
    content: '.js-jip-description',
    toggle: '.js-jip-card-toggle',
    activeClass: 'jip-card__item--active'
  }
  const args = getModuleOptions(MODULE_NAME, el, defaults)
  const rows = selectAll(args.item, el)
  const activateRow = addClass(args.activeClass)
  const deactivateRow = removeClass(args.activeClass)
  const cardTitleEls = selectAll(CARD_TITLE_SELECTOR, el)
  let cardTitleMaxHeight = 0
  let cardDescriptionHeight = 0
  const getCardTitleMaxHeight = () => {
    if (cardTitleEls.length) {
      // Get max height
      cardTitleEls.map((item) => {
        const itemHeight = getHeight(item)
        if (itemHeight > cardTitleMaxHeight) {
          cardTitleMaxHeight = itemHeight
        }
      })
    }
    return cardTitleMaxHeight
  }
  const equalCardTitleHeight = () => {
    if (cardTitleEls.length) {
      const cardTitleMaxHeight = getCardTitleMaxHeight()
      // Need another loop to set height
      cardTitleEls.map((item) => {
        const parentEl = item.parentNode
        setStyle('min-height', `${cardTitleMaxHeight}px`, parentEl)
      })
    }
  }
  const showContent = (row) => {
    const content = select(args.content, row)
    if (content) {
      cardDescriptionHeight = content.scrollHeight
      setStyle('maxHeight', content.scrollHeight + 'px', content)
    }
    return row
  }

  const doAnimation = (row) => {
    const rowCTAEl = select(CARD_CTA_SELECTOR, row)
    const slideIndex = parseInt(getData('index', row))
    const rowWidth = rowCTAEl ? getWidth(rowCTAEl) : 0
    const rowHeight = rowCTAEl ? getHeight(rowCTAEl) : 0
    const carousel = select(CAROUSEL_SELECTOR, el)
    const cardTitleHeight = getCardTitleMaxHeight()
    if (carousel) {
      const carouselEl = Flickity.data(carousel)
      if (window.innerWidth < 980) {
        const defaultHeight = carouselEl.maxCellHeight
        const cardImage = select(CARD_IMAGE_SELECTOR, row)
        const cardImageHeight = getHeight(cardImage)
        const getCarouselHeight = () => {
          let totalHeight = 0
          if (window.innerWidth < 740) {
            totalHeight = cardImageHeight + cardDescriptionHeight + cardTitleHeight + 30
            // 30 = 40 (padding top/bottom) - 35 (offset spacing of card description) + 25 (spacing to arrow)
          } else {
            const cardHeight = 86 + cardDescriptionHeight + cardTitleHeight
            // 86 = 46 (top image spacing on design) + 40 (padding top/bottom)
            totalHeight = cardHeight > 250 ? cardHeight : 250
            // 250 = default card height on design
            totalHeight = totalHeight + 25
            // 25 = bottom spacing from card to next/prev arrow
          }
          return (totalHeight < defaultHeight)
            ? defaultHeight
            : isActiveRow(row)
              ? totalHeight
              : defaultHeight
        }
        const carouselHeight = getCarouselHeight()
        setStyle('height', `${carouselHeight}px`, carouselEl.viewport)
        // Disable card expand state on dragend
        carouselEl.on('dragEnd', () => {
          deactivateRows()
          carouselEl.cells.map((cell, index) => {
            generateLeftPositionBySlideIndex(cell, rowWidth, isActiveRow(row), (index > slideIndex))
          })
        })
      } else if (rowWidth > 0) {
        if (isActiveRow(row)) {
          /**
           * Auto scroll slider
           */
          setTimeout(() => {
            const rowRect = row.getBoundingClientRect()
            // scroll slider to left
            if (rowRect.x + (rowWidth * 2) > window.innerWidth) {
              carouselEl.next()
            } else if (rowRect.x < 0) {
              // scroll slider to right
              carouselEl.previous()
            }
          }, 300) // 300ms is animation delayed time

          /**
           * Add a fake cell with same height/width with current to extend carousel width
           */
          const carouselSlides = carouselEl.slides
          const fakeCellClass = 'fake-cell'
          if (carouselSlides.length) {
            const fakeCell = carouselSlides.filter(slide => {
              const element = slide.cells[0].element
              return hasClass(fakeCellClass, element)
            })
            if (!fakeCell.length) {
              const cell = document.createElement('div')
              cell.className = fakeCellClass
              cell.style.width = `${rowWidth}px`
              cell.style.height = `${rowHeight + 40}px` // 40 is item padding top + bottom (for desktop only)
              carouselEl.append(cell)
            }
          }
        } else {
          // remove last item (the fake one we appended above)
          carouselEl.remove(carouselEl.slides.pop().cells[0].element)
        }
      }
      // re-calculate cell position
      carouselEl.cells.map((cell, index) => {
        generateLeftPositionBySlideIndex(cell, rowWidth, isActiveRow(row), (index > slideIndex))
      })
    }
  }

  const generateLeftPositionBySlideIndex = (slide, itemWidth, isOpened, isAfterCurrent) => {
    const leftPosition = isOpened
      ? isAfterCurrent
        ? slide.x + itemWidth
        : slide.x
      : slide.x
    setStyle('left', `${leftPosition}px`, slide.element)
  }

  const isActiveRow = (row) => {
    return hasClass(args.activeClass, row)
  }

  const hideContent = (row) => {
    const content = select(args.content, row)
    if (content) {
      cardDescriptionHeight = 0
      setStyle('maxHeight', '0', content)
    }
    return row
  }

  const deactivateRows = () => map((row) => {
    hideContent(row)
    deactivateRow(row)
  }, rows)

  const maybeActiveRow = (row) => {
    if (isActiveRow(row)) {
      pipe(
        deactivateRow,
        hideContent,
        doAnimation
      )(row)
    } else {
      deactivateRows()
      pipe(
        activateRow,
        showContent,
        doAnimation
      )(row)
    }
    return row
  }
  map((row) => {
    const rowHeader = select(args.toggle, row)
    if (rowHeader) {
      on('click', (event) => {
        event.preventDefault()
        partial(
          maybeActiveRow
        )(row)
      }, rowHeader)
    }
  }, rows)

  setTimeout(equalCardTitleHeight, 300)
  on('resize', () => {
    deactivateRows()
    throttle(equalCardTitleHeight, 250)
  }, window)
}
