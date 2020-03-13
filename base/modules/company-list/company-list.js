import {
  selectAll,
  on,
  trigger
} from 'lib/dom'

import { initializeModuleForEl } from 'lib/init-modules'

export default (el) => {
  const FILTER_CATEGORY_SELECTOR = '.js-meta-tag'

  const filterCategoryEls = selectAll(FILTER_CATEGORY_SELECTOR, el)

  if (filterCategoryEls.length) {
    on('click', (event) => {
      const text = event.target.innerText
      trigger('startup.filter', document.body, {name: text})
    }, filterCategoryEls)
  }

  on('companyList.reInit', (event) => {
    initializeModuleForEl(el)
  }, document.body)
}
