import { select } from 'lib/dom'
export default function (el) {
  const canvas = select('.js-canvas', el)
  let context = ''
  const rays = []

  if (canvas) {
    context = canvas.getContext('2d')
  }

  const randomDirection = () => {
    return Math.random() < 0.5 ? -1 : 1
  }
  const randomSpeed = () => {
    return Math.random() * 1.25
  }
  const randomInBetween = () => {
    return Math.floor((Math.random() * 400) + 300)
  }
  const createRays = () => {
    for (var i = 0; i < 14; i++) {
      if (i % 2 === 0) {
        rays.push({
          d1: randomDirection(),
          d2: randomDirection(),
          s1: randomSpeed(),
          s2: randomSpeed(),
          x1: randomInBetween(),
          x2: randomInBetween()
        })
      } else {
        rays.push({
          d1: randomDirection(),
          d2: randomDirection(),
          s1: randomSpeed(),
          s2: randomSpeed(),
          y1: randomInBetween(),
          y2: randomInBetween()
        })
      }
    }
  }

  const drawCanvas = () => {
    context.clearRect(0, 0, canvas.width, canvas.height)
    for (var i = 0; i < rays.length; i++) {
      if (rays[i].x1) {
        rays[i].x1 += rays[i].s1 * rays[i].d1
        rays[i].x2 += rays[i].s2 * rays[i].d2

        context.beginPath()
        context.moveTo(rays[i].x1, 0)
        context.lineTo(rays[i].x2, 1010)
        context.lineWidth = 3
        context.strokeStyle = '0044a3'
        context.stroke()

        if (rays[i].x1 <= 295 || rays[i].x1 >= 710) {
          rays[i].d1 *= -1
        }

        if (rays[i].x2 <= 295 || rays[i].x2 >= 710) {
          rays[i].d2 *= -1
        }
      } else {
        rays[i].y1 += rays[i].s1 * rays[i].d1
        rays[i].y2 += rays[i].s2 * rays[i].d2

        context.beginPath()
        context.moveTo(0, rays[i].y1)
        context.lineTo(1010, rays[i].y2)
        context.lineWidth = 3
        context.strokeStyle = '#0044a3'
        context.stroke()

        if (rays[i].y1 <= 295 || rays[i].y1 >= 710) {
          rays[i].d1 *= -1
        }

        if (rays[i].y2 <= 295 || rays[i].y2 >= 710) {
          rays[i].d2 *= -1
        }
      }
    }

    window.requestAnimationFrame(drawCanvas)
  }

  // Site.onResize.push(update)
  if (context) {
    createRays()
    drawCanvas()
  }
}
