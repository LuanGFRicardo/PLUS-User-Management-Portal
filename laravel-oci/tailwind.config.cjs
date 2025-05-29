module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.jsx",
    "./resources/**/*.vue",
    "./public/**/*.html"
  ],
  theme: {
      extend: {
          colors: {
              primary: {
                  50:  '#f3f6fa',
                  100: '#e1e9f2',
                  200: '#c2d3e4',
                  300: '#a3bdd6',
                  400: '#7391b9',
                  500: '#5277a5',
                  600: '#416d9c',
                  700: '#355a7f',
                  800: '#294662',
                  900: '#1f364c',
              },
          },
      },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}
