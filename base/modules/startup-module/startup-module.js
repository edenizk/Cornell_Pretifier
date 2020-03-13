import {
  select,
  selectAll,
  on,
  getData,
  remove,
  createElement,
  setAttribute,
  addClass,
  removeClass,
  getModuleOptions, createNodes, append, getChildren, trigger
} from 'lib/dom'
import { getProp, pipe } from 'lib/utils'
import { initializeModuleForEl } from 'lib/init-modules'
import { updateLazyLoad } from 'modules-root/image/image'
import { fetchGrid } from 'modules-root/load-more/load-more'
import { scrollToTarget } from 'modules-root/page-scroll/page-scroll'
import ClipBoard from 'clipboard'

const MODULE_NAME = 'startup-module'
const BREAK_POINT_MOBILE = 800

export default (el) => {
  const defaults = {
    url: '',
    perpage: 0,
    new_layout: false
  }
  const args = getModuleOptions(MODULE_NAME, el, defaults)
  const FILTER_CHECKBOX_SELECTOR = '.js-company-filter-checkbox'
  const FILTER_APPLY_SELECTOR = '.js-company-filter-apply'
  const FILTER_KEY_SELECTOR = '.js-filter-key'
  const FILTER_KEY_WRAPPER_SELECTOR = '.js-filter-key-wrapper'
  const FILTER_RESET_BUTTON_SELECTOR = '.js-company-filter-reset'
  const FILTER_COPY_LINK_SELECTOR = '.js-company-filter-copy'
  const FILTER_COPIED_LINK_CLASS = 'company-filter__link-copy--copied'
  const RESET_BUTTON_ACTIVE_CLASS = 'company-filter__reset--active'
  const HAS_FILTER_CLASS = 'company-filter-keys--active'
  const COMPANY_LIST_SELECTOR = '.js-company-list'
  const COMPANY_LIST_ANCHOR = '#company-list-anchor'

  const filterCheckboxEls = selectAll(FILTER_CHECKBOX_SELECTOR, el)
  const filterApplyButton = select(FILTER_APPLY_SELECTOR, el)
  const filterKeyEls = selectAll(FILTER_KEY_SELECTOR, el)
  const filterResetButtonEl = select(FILTER_RESET_BUTTON_SELECTOR, el)
  const filterKeyWrapperEL = select(FILTER_KEY_WRAPPER_SELECTOR, el)
  const companyListEl = select(COMPANY_LIST_SELECTOR, el)
  const filterCopyLinkButton = select(FILTER_COPY_LINK_SELECTOR, el)

  if (filterCheckboxEls) {
    filterCheckboxEls.map((checkbox) => {
      on('click', () => {
        addClass('clicked', checkbox.parentNode)
      }, checkbox.parentNode)
      on('keyup', (e) => {
        if (e.keyCode === 9) {
          removeClass('clicked', checkbox.parentNode)
        }
      }, checkbox)
    })
  }

  const updateKeyList = (key, value, text, checked) => {
    if (checked) {
      // add key
      const newKey = pipe(
        createElement,
        setAttribute('href', '#'),
        setAttribute('data-group', key),
        setAttribute('data-tax', value),
        setAttribute('class', 'p company-filter-keys__link js-filter-key')
      )('a')
      newKey.innerHTML = `<span class="icon-close company-filter-keys__icon"></span>${text}`
      filterKeyWrapperEL.appendChild(newKey)
    } else {
      // remove key
      const filterKeyNewEls = selectAll(FILTER_KEY_SELECTOR)
      const filterKeyCheck = filterKeyNewEls.filter((keyEl) => {
        return getData('tax', keyEl) === value
      })
      if (filterKeyCheck && filterKeyCheck[0]) {
        remove(filterKeyCheck[0])
      }
    }
    initializeModuleForEl(el)
  }

  const showHideResetButton = () => {
    let hasFilter = false
    filterCheckboxEls.map((checkbox) => {
      if (checkbox.checked) {
        hasFilter = true
      }
    })

    if (hasFilter) {
      addClass(RESET_BUTTON_ACTIVE_CLASS, filterResetButtonEl)
      addClass(HAS_FILTER_CLASS, filterKeyWrapperEL)
    } else {
      removeClass(RESET_BUTTON_ACTIVE_CLASS, filterResetButtonEl)
      removeClass(HAS_FILTER_CLASS, filterKeyWrapperEL)
    }
  }

  const getQueryObject = () => {
    const queryObject = {}
    filterCheckboxEls.map((checkbox) => {
      if (checkbox.checked) {
        const key = getData('group', checkbox)
        const value = checkbox.value
        if (!queryObject[key]) {
          queryObject[key] = []
        }
        queryObject[key].push(value)
        queryObject[key].filter((x, i, a) => a.indexOf(x) === i)
      }
    })
    return queryObject
  }

  const buildQuery = () => {
    let queryObject = getQueryObject()
    return `?per_page=${args.perpage}&query=${JSON.stringify(queryObject)}`
  }

  const getDataFilter = (checkbox) => {
    const key = getData('group', checkbox)
    const value = checkbox.value
    const text = getData('text', checkbox)
    updateKeyList(key, value, text, checkbox.checked)
    showHideResetButton()
  }

  on('startup.filter', (event) => {
    if (event.detail) {
      const name = event.detail.name
      const checkbox = select(`[data-text='${name}']`, el)

      if (!checkbox) return
      checkbox.checked = !checkbox.checked
      getDataFilter(checkbox)
      fetchAPI()
      trigger('accordion.activeRow', document.body, { activeEl: checkbox })
    }
  }, document.body)

  filterCheckboxEls.map((checkbox) => {
    on('change', () => {
      getDataFilter(checkbox)
    }, checkbox)
  })

  filterKeyEls.map((filter) => {
    on('click', (e) => {
      e.preventDefault()
      const value = getData('tax', filter)
      // Remove filter
      remove(filter)
      // Uncheck checkbox
      const linkedCheckbox = filterCheckboxEls.filter((checkbox) => { return checkbox.value === value })
      if (linkedCheckbox) {
        linkedCheckbox[0].checked = false
      }
    }, filter)
  })

  const buildCompanyList = (response) => {
    if (typeof response === 'string') {
      response = JSON.parse(response)
    }

    // create nodes based on returned HTML
    const nodes = pipe(
      getProp('html'),
      createNodes
    )(response)

    // remove nodes
    while (companyListEl.firstChild) {
      companyListEl.removeChild(companyListEl.firstChild)
    }

    // append new nodes
    nodes.map((node) => {
      append(companyListEl, getChildren(node))
    })

    // initialize modules inside those nodes if there are any
    selectAll('[data-module]', companyListEl).map((list) => {
      initializeModuleForEl(list)
      trigger('companyList.reInit', document.body)
    })

    // force update lazy load so that images inside viewport starts loading
    updateLazyLoad()
  }

  const fetchAPI = () => {
    const params = buildQuery()
    fetchGrid(`${args.url}${params}`)
      .then((response) => {
        buildCompanyList(response)
      })
  }

  const initCopyButton = () => {
    return new ClipBoard(filterCopyLinkButton, {
      text: () => {
        let url = `${window.location.href}?`
        const params = []
        const queryObject = getQueryObject()
        Object.keys(queryObject).map((key) => {
          params.push(`${key}=${queryObject[key].join(',')}`)
        })
        url += params.join('&')
        return url
      }
    })
  }

  if (filterCopyLinkButton) {
    const copyButton = initCopyButton()
    copyButton.on('success', (e) => {
      addClass(FILTER_COPIED_LINK_CLASS, filterCopyLinkButton)
      setTimeout(() => {
        removeClass(FILTER_COPIED_LINK_CLASS, filterCopyLinkButton)
      }, 1000)
    })
  }

  // Reset action
  on('click', (e) => {
    e.preventDefault()
    // hide button
    removeClass(RESET_BUTTON_ACTIVE_CLASS, filterResetButtonEl)
    // reset checkbox
    filterCheckboxEls.map(checkbox => { checkbox.checked = false })
    // reset keys
    const newFilterKeyEls = selectAll(FILTER_KEY_SELECTOR, el)
    newFilterKeyEls.map(key => { remove(key) })
    showHideResetButton()
    // fetch API
    fetchAPI()
  }, filterResetButtonEl)

  // Apply filter action
  on('click', (e) => {
    e.preventDefault()
    fetchAPI()
    scrollToTarget(COMPANY_LIST_ANCHOR)
  }, filterApplyButton)

  if (args.new_layout && window.innerWidth >= BREAK_POINT_MOBILE) {
    filterCheckboxEls.map((checkbox) => {
      on('click', () => {
        fetchAPI()
      }, checkbox)
    })
  }
}
