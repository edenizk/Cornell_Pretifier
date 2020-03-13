import { select, trigger, addClass, removeClass, getData, onEnter, on } from 'lib/dom'

const ACTIVE_CLASS = 'video-modal--activate'
const VIDEO_ACTIVE_CLASS = 'video--activate'

window.onYouTubeIframeAPIReady = () => {
  trigger('yt-loaded', window)
}

const initYT = () => {
  const tag = document.createElement('script')
  tag.src = 'https://www.youtube.com/iframe_api'
  const firstScriptTag = document.getElementsByTagName('script')[0]
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag)
}

initYT()

export default (el) => {
  const modalID = getData('modal', el)
  const modalToggle = select('[data-video-modal="' + modalID + '"]')
  const video = select('.js-video', el)
  const closeButton = select('.js-close', el)
  const iframe = getData('video-iframe', video)
  const activateVideo = () => addClass(VIDEO_ACTIVE_CLASS, video)
  const activateModalVideo = () => {
    setTimeout(() => closeButton.focus(), 250)
    addClass(ACTIVE_CLASS, el)
  }
  const deactivateModalVideo = () => removeClass(ACTIVE_CLASS, el)
  const onPlayerReady = (event) => {
    if (modalToggle) {
      on('click', (e) => {
        e.preventDefault()
        event.target.playVideo()
        activateVideo()
        activateModalVideo()
      }, modalToggle)
      onEnter(modalToggle, (e) => {
        e.preventDefault()
        event.target.playVideo()
        activateVideo()
        activateModalVideo()
      })
      on('click', () => {
        event.target.stopVideo()
        deactivateModalVideo()
      }, el)
      on('click', () => {
        event.target.stopVideo()
        deactivateModalVideo()
      }, closeButton)
      onEnter(closeButton, (e) => {
        event.target.stopVideo()
        deactivateModalVideo()
      })
    }
  }
  on('yt-loaded', () => {
    const player = new window.YT.Player(iframe, {
      events: {
        'onReady': onPlayerReady
      }
    })
    return player
  }, window)
}
