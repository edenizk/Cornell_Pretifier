import { selectAll, getHeight, setHeight, on } from 'lib/dom'
import { map } from 'lib/utils'
import throttle from 'lodash.throttle'

const labelMediaHighlightEl = '.js-label-media-highlight'
const resetHeight = setHeight('auto')
const resetHeightELs = (els) => map(resetHeight, els)
const maxHeight = (els) => map(getHeight, els).reduce((height, max = 0) => Math.max(height, max))
const setMaxHeightEl = (height, els) => map(setHeight(height + 'px'), els)

export default (el) => {
  const labelItems = selectAll(labelMediaHighlightEl, el)
  if (labelItems.length > 0) {
    const setStyleLabelItems = () => {
      resetHeightELs(labelItems)
      const maxHeightLabelItems = maxHeight(labelItems)
      setMaxHeightEl(maxHeightLabelItems, labelItems)
    }
    on('resize', throttle(setStyleLabelItems, 500), window)
    on('load', setStyleLabelItems, window)
  }
}
