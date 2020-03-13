import { select, trigger, addClass, getData, onEnter, on } from 'lib/dom'

const ACTIVE_CLASS = 'video--activate'

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
  const iframe = getData('video-iframe', el)
  const controller = select('.js-control', el)
  if (!iframe && !controller) {
    return
  }
  const activateVideo = () => addClass(ACTIVE_CLASS, el)
  const onPlayerReady = (event) => {
    if (controller) {
      on('click', () => {
        event.target.playVideo()
        activateVideo()
      }, controller)
      onEnter(controller, () => {
        event.target.playVideo()
        activateVideo()
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
