const colors = require('tailwindcss/colors')

module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
    ],
    theme: {
      extend: {
        colors: {
          'avocado-primary': '#2d5a27', // Deep green
          'avocado-secondary': '#88b04b', // Light green
        },
      },
    },
    
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
