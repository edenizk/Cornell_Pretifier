import { addClass, getHeight, getScrollTop, getWidth, removeClass, select, setStyle } from 'lib/dom'
import throttle from 'lodash.throttle'
import on from 'dom-event'

const activeClass = 'magnetic-link--active'
const closeModalSelector = '.js-magnetic-link-close'
const startPercent = 10
const endPercent = 80
const main = select('.js-main')
let isModalClosed = false

export default (el) => {
  let start = 0
  let end = 0
  const closeModalEl = select(closeModalSelector, el)
  const showPopup = () => addClass(activeClass, el)
  const hidePopup = () => removeClass(activeClass, el)

  const calculatePosition = () => {
    const documentHeight = getHeight(main)
    end = documentHeight * endPercent / 100
    if (window.innerWidth < 740) {
      start = 0
    } else {
      start = documentHeight * startPercent / 100
    }
  }
  calculatePosition()
  on(window, 'resize', calculatePosition)

  const togglePosition = () => {
    const offset = getScrollTop()
    if (offset >= start && offset + window.innerHeight * ((100 - endPercent) / 100) < end && !isModalClosed) {
      showPopup()
    } else {
      hidePopup()
    }
  }

  const calculateRightOffset = () => {
    const windowWidth = window.innerWidth
    const mainWidth = getWidth(main)
    const offsetRight = (windowWidth - mainWidth) > 0 ? windowWidth - mainWidth : 0
    setStyle('right', `${offsetRight}px`, el)
  }

  calculateRightOffset()
  on(window, 'resize', calculateRightOffset)

  togglePosition()
  on(window, 'scroll', throttle(togglePosition, 100))

  if (closeModalEl) {
    on(closeModalEl, 'click', (e) => {
      e.preventDefault()
      isModalClosed = true
      removeClass(activeClass, el)
    })
  }
}
