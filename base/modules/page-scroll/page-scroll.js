import {
  scrollTop,
  trigger
} from 'lib/dom'

export const scrollToTarget = (id) => {
  const target = document.querySelector(id)

  if (!target) {
    return
  }

  const isStickyHeader = document.documentElement
    .getAttribute('data-sticky-header') === 'true'

  const header = document.querySelector('header[data-module="header"]')

  let offset = target.getBoundingClientRect().top +
    (window.pageYOffset ||
      document.documentElement.scrollTop ||
      document.body.scrollTop) -
    (header && isStickyHeader
      ? (header || {}).clientHeight || 0
      : 0)

  if (offset) {
    scrollTop(offset, () => {
      target.focus()
    })
  }

  const parentIsToggle = target.parentNode &&
    target.parentNode.classList.contains('js-toggle')

  if (offset && parentIsToggle) {
    trigger('click', target.parentNode)
  }
}

export default (el) =>
  Array.from(el.querySelectorAll(`a[href^="#"]`))
    .forEach(link => link
      .addEventListener('click', (e) => {
        e.preventDefault()
        link.blur()
        scrollToTarget(link.getAttribute('href'))
      }))
