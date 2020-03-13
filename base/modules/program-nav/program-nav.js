import { on, select, selectAll, addClass, removeClass, hasClass, getModuleOptions } from 'lib/dom'
import { map, makeArray } from 'lib/utils'

const MODULE_NAME = 'program-nav'
const body = document.body
const PROGRAM_TAB_CLASS = '.js-program-tab'
const PROGRAM_ACTIVATE_CLASS = 'program-tab--activate'

export default function (el) {
  const defaults = {
    currentClass: '.js-current-select',
    selectClass: '.js-select',
    navListClass: '.js-nav-list',
    activeClass: 'program-nav__item--active'
  }
  const args = getModuleOptions(MODULE_NAME, el, defaults)
  const currentSelector = select(args.currentClass, el)
  const selectEl = select(args.selectClass, el)
  const navList = selectAll(args.navListClass, el)
  const programTabs = selectAll(PROGRAM_TAB_CLASS, body)
  if (navList && programTabs) {
    const reset = () => {
      map(removeClass(args.activeClass), navList)
      map(removeClass(PROGRAM_ACTIVATE_CLASS), programTabs)
    }
    const isActivateItem = (index) => hasClass(args.activeClass, navList[index])
    const activate = (index) => {
      addClass(args.activeClass, navList[index])
      addClass(PROGRAM_ACTIVATE_CLASS, programTabs[index])
      currentSelectText(index)
      selectEl.selectedIndex = index
    }
    const currentSelectText = (index) => {
      const selectText = navList[index].textContent
      currentSelector.innerHTML = selectText
    }
    on('load', activate(0), window)
    on('click', function () {
      const itemsArray = makeArray(this.parentElement.children)
      const navIndex = itemsArray.indexOf(this)
      if (!isActivateItem(navIndex)) {
        reset()
        activate(navIndex)
      }
    }, navList)
    on('change', function () {
      const selectedIndex = this.selectedIndex
      if (!isActivateItem(selectedIndex)) {
        reset()
        activate(selectedIndex)
      }
    }, selectEl)
  }
}
