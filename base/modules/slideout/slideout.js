import { on, select, selectAll, addClass, removeClass, hasClass, getModuleOptions, setStyle, setAttribute, closest } from 'lib/dom'
import { map, partial, pipe } from 'lib/utils'

const MODULE_NAME = 'slideout'

export default function (el) {
  const defaults = {
    item: '.menu-item-has-children',
    content: '.sub-menu',
    toggle: '.js-submenu-toggle',
    activeClass: 'submenu-activate',
    deactivateAccordion: 'header-nav-jacobs',
    noAccordionClass: 'submenu-no-accordion',
    currentMenuItem: '.current-menu-item',
    currentPageAncestorClass: 'current-page-ancestor'
  }
  const args = getModuleOptions(MODULE_NAME, el, defaults)
  const rows = selectAll(args.item, el)
  const activateRow = addClass(args.activeClass)
  const deactivateRow = removeClass(args.activeClass)

  const showContent = (row) => {
    const content = select(args.content, row)
    const contentWrap = closest(args.content, row)
    if (contentWrap) {
      setStyle('maxHeight', '100%', contentWrap)
    }
    if (content) {
      setStyle('maxHeight', content.scrollHeight + 'px', content)
      setAttribute('aria-hidden', false, content)
    }
    return row
  }
  const isActiveRow = (row) => hasClass(args.activeClass, row)
  const isDeactivateAccordion = (row) => hasClass(args.deactivateAccordion, row)
  const isSubRow = (row) => closest(args.content, row)
  const hideContent = (row) => {
    const content = select(args.content, row)
    if (content) {
      setStyle('maxHeight', `${content.clientHeight}px`, content)
      setStyle('maxHeight', '0', content)
      setAttribute('aria-hidden', true, content)
    }
    return row
  }
  const deactivateRows = () => map((row) => {
    if (!isDeactivateAccordion(row)) {
      hideContent(row)
      deactivateRow(row)
    }
  }, rows)

  const deactivateRowsSameLevel = (row) => {
    const rowsSameLevel = selectAll(args.item, row.parentNode)
    map((row) => {
      hideContent(row)
      deactivateRow(row)
    }, rowsSameLevel)
  }

  const maybeActiveRow = (row) => {
    if (isActiveRow(row)) {
      pipe(
        deactivateRow,
        hideContent
      )(row)
    } else {
      if (isSubRow(row)) {
        deactivateRowsSameLevel(row)
      } else {
        deactivateRows()
      }
      pipe(
        activateRow,
        showContent
      )(row)
    }
    return row
  }
  const expandMenuItem = (row) => {
    addClass(args.noAccordionClass, row)
    pipe(
      activateRow
    )(row)
  }
  map((row) => {
    const rowHeader = select(args.toggle, row)
    if (isDeactivateAccordion(row)) {
      partial(
        expandMenuItem
      )(row)
    }
    if (rowHeader && !isDeactivateAccordion(row)) {
      on('click', (e) => {
        e.preventDefault()
        partial(
          maybeActiveRow
        )(row)
      }, rowHeader)
    }
  }, rows)

  on('resize', (e) => {
    Array.from(el
      .querySelectorAll('.sub-menu[aria-hidden="false"]'))
      .filter(item => item.style.maxHeight !== '100%')
      .forEach(item => {
        item.style.maxHeight = '100%'
      })
  }, window)

  const addActiveMenuClass = () => {
    const currentMenuItemEls = selectAll(args.currentMenuItem, el)
    if (currentMenuItemEls.length) {
      map(el => {
        const parentMenuItem = closest(args.item, el)
        if (parentMenuItem && !hasClass(args.currentPageAncestorClass, parentMenuItem)) {
          addClass(args.currentPageAncestorClass, parentMenuItem)
        }
      }, currentMenuItemEls)
    }
  }
  addActiveMenuClass()

  const expandCurrentParentsMenuItem = () => {
    const parentMenuEls = selectAll('.current-page-ancestor', el)

    if (parentMenuEls.length) {
      map(row => {
        const content = select(args.content, row)
        if (content) {
          activateRow(row)
          setStyle('maxHeight', '100%', content)
          setAttribute('aria-hidden', false, content)
        }
      }, parentMenuEls)
    }
  }
  expandCurrentParentsMenuItem()
}
