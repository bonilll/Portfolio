function pxToRem (px = 16) {
  const precision = 3;
  const multiplier = Math.pow(10, precision + 1);
  const wholeNumber = Math.floor((1 / 16 * px) * multiplier);
  const result = Math.round(wholeNumber / 10) * 10 / multiplier;
  return result + (result > 0 ? 'rem' : '');
}

function mapToObj (arr = [], fn = v => v) {
  const obj = {};
  arr.forEach(el => obj[el] = fn(el));
  return obj;
}

function mapToRem (arr = []) {
  return mapToObj(arr, pxToRem)
}

function lightenDarkenColor (col, amt) {

  let usePound = false;

  if (col[0] === "#") {
    col = col.slice(1);
    usePound = true;
  }

  const num = parseInt(col, 16);

  let r = (num >> 16) + amt;

  if (r > 255) r = 255;
  else if (r < 0) r = 0;

  let b = ((num >> 8) & 0x00FF) + amt;

  if (b > 255) b = 255;
  else if (b < 0) b = 0;

  let g = (num & 0x0000FF) + amt;

  if (g > 255) g = 255;
  else if (g < 0) g = 0;

  return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16);

}

function makeArr (min, max, base) {
  return Array.apply(null, {length: (max / base) + 1 - min}).map(function (_, idx) {
    return (idx + min) * 5;
  });
}

function makeShades (col) {
  return {
    '100': lightenDarkenColor(col, 160),
    '200': lightenDarkenColor(col, 120),
    '300': lightenDarkenColor(col, 80),
    '400': lightenDarkenColor(col, 40),
    '500': col,
    '600': lightenDarkenColor(col, -40),
    '700': lightenDarkenColor(col, -80),
    '800': lightenDarkenColor(col, -120),
    '900': lightenDarkenColor(col, -160),
  }
}

module.exports = {
  pxToRem,
  mapToObj,
  mapToRem,
  makeShades,
  makeArr
};
