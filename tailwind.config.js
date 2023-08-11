module.exports = {
  prefix: 'tw-',
  // important: true,
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  media: false, // or 'media' or 'class'
  theme: {
    extend: {
      minHeight: {
        '12': '3rem',
      },
      textColor: {
        'gold': '#bda413',
      },
      backgroundColor: {
        'gold': '#bda413',
      },
      screens: {
        '2max-xl': {'max': '1535px'},
        // => @media (max-width: 1535px) { ... }
        'max-xl': {'max': '1279px'},
        // => @media (max-width: 1279px) { ... }
        'max-lg': {'max': '1023px'},
        // => @media (max-width: 1023px) { ... }
        'max-md': {'max': '767px'},
        // => @media (max-width: 767px) { ... }
        'max-sm': {'max': '639px'},
        // => @media (max-width: 639px) { ... }
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
  corePlugins: {
    preflight: false,
  }
}
