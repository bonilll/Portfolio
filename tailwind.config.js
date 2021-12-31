const {colors} = require('tailwindcss/defaultTheme');
const {mapToRem, makeArr} = require('./assets/tailwind/functions');

const spacing = makeArr(0, 100, 5);

module.exports = {
  theme: {

    fontSize  : mapToRem([12, 14, 16, 18, 20, 22, 24, 30, 32, 36, 42, 48]),
    spacing   : mapToRem([...spacing, 8, 16, 150, 200, 380, ]),
    colors  : {
      ...colors,
      red: {
        '500': '#FF0000'
      },
      gray: {
        '100': '#F1F1F1',
        '200': '#E1E1E1',
        '300': '#DEE0DA',
        '400': '#C1C1C1',
        '900': '#1F1F1F',
      }
    },

    height: {
      'header': '720px',
      'menuitems': '90vh',
      'block': '450px',
      'form': '380px',
      'textblock': '420px',
    },
    screens: {
      'sm': '1032px',
      // => @media (min-width: 640px) { ... }

      'md': '1280px',
      // => @media (min-width: 1024px) { ... }

      'lg': '1440px',
      // => @media (min-width: 1280px) { ... }
    },
    extend: {
      fontFamily: {
        sans: ['basis', 'sans-serif'],
        serif: ['gtsuper', 'serif'],
      },
      maxWidth  : {
        'row': 'calc(100% - 10%)',
        'textheader': '558px',
        'textwhat': '420px',
        'blockwhat': '580px',
      },
    },
  }
};

