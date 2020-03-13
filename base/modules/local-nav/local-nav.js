import { on, select, toggleClass, selectAll, getAttribute } from 'lib/dom'

const ACTIVATE_CLASS = 'js-local-nav--activate'
// const ARROW_ACTIVE_CLASS = 'arrow--active'

const setSelectedTextMobile = (selectDropDown, selectContainer, classDisplay) => {
  selectDropDown.forEach(function (item) {
    on('change', function () {
      let optionText = item.options[item.selectedIndex].text
      setTextCurrent(selectContainer, classDisplay, optionText)
      // redirect to url
      let optionUrl = getAttribute('value', item.options[item.selectedIndex])
      window.location.href = optionUrl
    }, item)
  })
}

// function set text to display object
const setTextCurrent = (containerObject, childClass, text) => {
  let children = selectAll('.' + childClass)
  children.forEach(function (item) {
    item.innerHTML = text
  })
}

// function main for select control on Mobile
const selectOnMobile = () => {
  let selectDropDown = selectAll('.local-nav__menu-mobile--content')
  let liObjects = selectAll('.js-toggle-li')

  if (selectDropDown && liObjects) {
    selectDropDown.forEach(function (item) {
      // find select container of this select
      let selectContainer = item.parentNode.parentNode
      // set text of selected option for display class
      setSelectedTextMobile(selectDropDown, selectContainer, 'local-nav__menu-selection')
    })
  }
}

export default function (el) {
  const LOCAL_NAV = select('.js-local-nav__menu', el)
  const activateLocalNav = () => toggleClass(ACTIVATE_CLASS, LOCAL_NAV)
  if (LOCAL_NAV) {
    on('click', activateLocalNav, LOCAL_NAV)
  }
  selectOnMobile()
}
