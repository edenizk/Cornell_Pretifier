import { addClass } from 'lib/dom'

export default (el) => {
  const msieVersion = () => {
    const userAgent = window.navigator.userAgent
    const msie = userAgent.indexOf('MSIE ')
    if (msie > 0 || !!navigator.userAgent.match(/(MSIE 10)|(Trident.*rv:11\.0)|( Edge\/[\d\\.]+$)/)) {
      return true
    }
    return false
  }

  if (el && msieVersion()) {
    addClass('is-grayscale', el)
  }
}
