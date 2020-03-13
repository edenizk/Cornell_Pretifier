import { on, remove, removeClass, select, selectAll } from 'lib/dom'

const HIDE_CLASS = 'hide'
const BUTTON_SELECTOR = '.js-button'
const ITEM_SELECTOR = '.js-item'

export default (el) => {
  const button = select(BUTTON_SELECTOR, el)
  const items = selectAll(ITEM_SELECTOR, el)
  if (button) {
    on('click', (e) => {
      e.preventDefault()
      removeClass(HIDE_CLASS, items)
      remove(button)
    }, button)
  }
}
