import { getModuleOptions, on, onFocus, onBlur, selectAll, toggleClass, hasClass, addClass, removeClass } from 'lib/dom'
import { map } from 'lib/utils'

const MODULE_NAME = 'toggle-class'

export default function (el) {
  const defaults = {
    target: 'body',
    class: 'is-activate'
  }
  const args = getModuleOptions(MODULE_NAME, el, defaults)
  const target = selectAll(args.target)
  const removeClassTarget = args.removeClassTarget ? selectAll(args.removeClassTarget) : target
  on('click', () => {
    map((item) => {
      toggleClass(args.class, item)
      if (args.removeClass) {
        removeClass(args.removeClass, removeClassTarget)
      }
    }, target)
  }, el)
  map((item) => {
    onFocus(item, () => {
      if (!hasClass(args.class, item)) {
        addClass(args.class, item)
        removeClass(args.removeClass, removeClassTarget)
      }
    })
    onBlur(item, () => {
      if (hasClass(args.class, item)) {
        removeClass(args.class, removeClassTarget)
      }
    })
  }, target)
}
