import { append, createNodes, getData, hide, on, select } from 'lib/dom'
import { getProp, partial, pipe, then } from 'lib/utils'
import { Promise } from 'es6-promise'
import { updateLazyLoad } from 'modules-root/image/image'
import { initializeModuleForEl } from 'lib/init-modules'
import nanoajax from 'nanoajax'

const getListSelector = getData('selector')

export const fetchGrid = (endpoint) => new Promise((resolve, reject) => {
  const params = {
    url: endpoint,
    method: 'GET',
    responseType: 'json'
  }
  nanoajax.ajax(
    params,
    (code, response) => {
      if (code === 200 && response) {
        resolve(response)
      } else {
        reject(response)
      }
    }
  )
})

const updateList = (list, response) => {
  // in IE, JSON response is not automatically parsed
  if (typeof response === 'string') {
    response = JSON.parse(response)
  }

  // create nodes based on returned HTML
  const nodes = pipe(
    getProp('html'),
    createNodes
  )(response)

  // append nodes to list
  append(list, nodes)

  // initialize modules inside those nodes if there are any
  nodes.map(node => {
    if (getData('module', node)) {
      initializeModuleForEl(node)
    }
  })

  // force update lazy load so that images inside viewport starts loading
  updateLazyLoad()

  return response
}

export default (el) => {
  const base = getData('base-url', el)
  const list = pipe(getListSelector, select)(el)
  const args = JSON.parse(getData('args', el))
  const perpage = getData('perpage', el)
  const offset = getData('offset', el)
  const argsLength = Object.keys(args).length

  let currentPage = 1

  const getEndPoint = () => {
    var url = `${base}?`
    let count = 0

    for (var key in args) {
      if (args.hasOwnProperty(key)) {
        url += `${key}=${args[key]}${count < (argsLength - 1) ? '&' : ''}`
        count++
      }
    }

    url += `&paged=${currentPage + 1}&offset=${parseInt(currentPage * perpage) + parseInt(offset)}`
    return url
  }

  const incrementPageNum = (response) => {
    currentPage++
    return response
  }

  const maybeHide = (response) => {
    if (currentPage >= response.totalPages) {
      hide(el)
    }

    return response
  }

  const updateListBySelector = pipe(
    partial(updateList, list),
    incrementPageNum,
    maybeHide
  )

  if (list) {
    on('click', pipe(
      getEndPoint,
      fetchGrid,
      then(updateListBySelector)
    ), el)
  }
}
