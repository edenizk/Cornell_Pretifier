import { on, select, selectAll, addClass, removeClass, hasClass, getModuleOptions, setStyle, closest } from 'lib/dom'
import { map, partial, pipe } from 'lib/utils'

const MODULE_NAME = 'accordion'
const BREAK_POINT = 799
const companyFilterInner = select('.js-company-filter-inner')

export default function (el) {
  const defaults = {
    item: '.js-row',
    content: '.js-content',
    toggle: '.js-toggle',
    activeClass: 'accordion-row--activate'
  }
  const args = getModuleOptions(MODULE_NAME, el, defaults)
  const rows = selectAll(args.item, el)
  const activateRow = addClass(args.activeClass)
  const deactivateRow = removeClass(args.activeClass)
  const showContent = (row) => {
    const content = select(args.content, row)
    if (content) {
      setStyle('maxHeight', content.scrollHeight + 'px', content)
      if (companyFilterInner && window.innerWidth <= BREAK_POINT) {
        let maxHeight = companyFilterInner.scrollHeight + content.scrollHeight
        setStyle('maxHeight', maxHeight + 'px', companyFilterInner)
      }
    }
    return row
  }
  const isActiveRow = (row) => hasClass(args.activeClass, row)
  const hideContent = (row) => {
    const content = select(args.content, row)
    if (content) {
      setStyle('maxHeight', '0', content)
    }
    return row
  }
  const deactivateRows = () => map((row) => {
    hideContent(row)
    deactivateRow(row)
  }, rows)
  on('accordion.activeRow', (event) => {
    const activeRow = event.detail.activeEl
    if (activeRow) {
      const row = closest(args.item, activeRow)
      maybeActiveRow(row)
    }
  }, document.body)
  const maybeActiveRow = (row) => {
    if (isActiveRow(row)) {
      pipe(
        deactivateRow,
        hideContent
      )(row)
    } else {
      deactivateRows()
      pipe(
        activateRow,
        showContent
      )(row)
    }
    return row
  }
  map((row) => {
    const rowHeader = select(args.toggle, row)
    if (rowHeader) {
      on('click', () => {
        partial(
          maybeActiveRow
        )(row)
      }, rowHeader)
    }
  }, rows)
}
