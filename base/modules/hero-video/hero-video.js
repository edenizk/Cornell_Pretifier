import {
  addClass,
  on,
  trigger,
  select,
  scrollTop,
  setStyle,
  setAttribute,
  getAttribute
} from 'lib/dom'

const HERO_LOADED_CLASS = 'hero-video--activate'

window.onYouTubeIframeAPIReady = () => {
  trigger('yt-loaded', window)
}

export default (el) => {
  const nextSection = el.nextElementSibling
  const buttonScroll = select('.js-hero-trigger', el)
  const iframeVideo = select('.js-iframe', el)
  const videoEl = select('.js-video', el)
  const videoType = videoEl ? getAttribute('data-type', videoEl) : false
  const videoId = videoEl ? getAttribute('data-id', videoEl) : false
  const videoPoster = select('.js-background', el)
  const videoControlButton = select('.js-hero-control', el)
  const isVideoSupported = !!document.createElement('video').canPlayType
  const isTouch = document.body.classList.contains('is-touch')
  const isVideo = () => isVideoSupported && !isTouch

  const displayBackground = () => {
    setStyle('opacity', 1, videoPoster)
    setStyle('opacity', 0, iframeVideo)
    addClass(HERO_LOADED_CLASS, el)
  }

  const displayVideo = () => {
    setStyle('opacity', 1, iframeVideo)
    setStyle('opacity', 0, videoPoster)
  }

  const initYT = () => {
    if (!isVideo()) {
      return displayBackground()
    }

    const tag = document.createElement('script')
    tag.src = 'https://www.youtube.com/iframe_api'
    const firstScriptTag = document.getElementsByTagName('script')[0]
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag)
  }

  on('load', initYT, window)

  const onPlayerReady = (event) => {
    const iframe = el.querySelector('iframe.js-video')

    if (iframe) {
      iframe.setAttribute('tabindex', '-1')
    }

    event.target.mute()

    if (isTouch) {
      event.target.playVideo()
    }

    addClass(HERO_LOADED_CLASS, el)
    setTimeout(displayVideo, 1500)
    addControlButton(event.target)
  }

  const onPlayerStateChange = (event) => {
    if (event.data === window.YT.PlayerState.ENDED) {
      event.target.playVideo()
    }

    if (event.data === 1) {
      showControlButton()
    }
  }

  const showControlButton = () => {
    if (videoControlButton) {
      setStyle('display', 'block', videoControlButton)
      setStyle('opacity', 1, videoControlButton)
    }
  }

  const isVideoPaused = () => {
    return getAttribute('paused', videoControlButton) === 'true'
  }

  const addControlButton = (player) => {
    if (!videoControlButton) {
      return
    }

    on('click', (e) => {
      e.preventDefault()
      if (isVideoPaused()) {
        player.playVideo()
        setAttribute('paused', false, videoControlButton)
      } else {
        player.pauseVideo()
        setAttribute('paused', true, videoControlButton)
      }
    }, videoControlButton)
  }

  on('yt-loaded', () => {
    if (videoEl && videoType === 'youtube') {
      const player = new window.YT.Player(videoEl, {
        videoId: videoId,
        width: '1920',
        height: '1080',
        playerVars: {
          'enablejsapi': 1,
          'autoplay': 1,
          'loop': 1,
          'controls': 0,
          'rel': 0,
          'wmode': 'transparent',
          'showinfo': 0,
          'mute': 1,
          'autohide': 0,
          'modestbranding': 1,
          'playsinline': 1,
          'hd': 1,
          'vq': 'hd1080',
          'disablekb': 1
        },
        events: {
          'onReady': onPlayerReady,
          'onStateChange': onPlayerStateChange
        }
      })
      return player
    }
  }, window)

  if (buttonScroll && nextSection) {
    const scroll = () => {
      if (!nextSection) {
        return
      }

      const isStickyHeader = document.documentElement
        .getAttribute('data-sticky-header') === 'true'

      const header = document.querySelector('header[data-module="header"]')

      let offset = header && isStickyHeader
        ? nextSection.getBoundingClientRect().top -
          ((header || {})
            .clientHeight || 0)
        : nextSection.getBoundingClientRect().top

      if (offset) {
        scrollTop(offset, () => {
          let isTabIndex = nextSection.getAttribute('tabindex')

          if (!isTabIndex) {
            nextSection.setAttribute('tabindex', '-1')
            nextSection.style.outline = 'none'
          }

          nextSection.focus()
          nextSection.blur()

          if (!isTabIndex) {
            nextSection.removeAttribute('tabindex')
            nextSection.style.outline = ''
          }
        }, undefined)
      }
    }
    on('click', scroll, buttonScroll)
  }

  const getVideoWidth = (height) =>
    height * 16 / 9

  const getVideoHeight = (width) =>
    width * 9 / 16

  const getTouchInnerHeight = () =>
    el.getAttribute('data-inner-height')
      ? Number(el.getAttribute('data-inner-height')) || window.innerHeight
      : null

  const setTouchInnerHeightAttr = () =>
    isTouch
      ? el.setAttribute('data-inner-height', window.innerHeight)
      : null

  const setSize = () => {
    let height
    let width

    const minTouchHeight = (window.screen || {})
      .availHeight || window.outerHeight

    if (el.getAttribute('data-orientation-change')) {
      setTouchInnerHeightAttr()
      el.removeAttribute('data-orientation-change')
    }

    if (getTouchInnerHeight()) {
      height = getTouchInnerHeight()

      if (el.style.minHeight !== `${height}px`) {
        el.style.minHeight = `${height}px`
      }

      if (!isVideo() &&
          videoPoster &&
          videoPoster.style.height !== `${minTouchHeight}px`) {
        videoPoster.style.height = `${minTouchHeight}px`
      }
    }

    if (!isVideo()) {
      return
    }

    width = getVideoWidth(isTouch
      ? minTouchHeight
      : window.innerHeight + 120) // Offset Youtube branding

    height = getVideoHeight(width)

    if (width < window.innerWidth) {
      height = getVideoHeight(window.innerWidth)
      width = window.innerWidth
    }

    height = `${height}px`
    width = `${width}px`

    if (height && iframeVideo.style.height !== height) {
      iframeVideo.style.height = height
    }

    if (width && iframeVideo.style.width !== width) {
      iframeVideo.style.width = width
    }
  }

  setTouchInnerHeightAttr()
  setSize()

  on('resize', setSize, window)
  on('orientationchange', () =>
    el.setAttribute('data-orientation-change', true), window)
}
