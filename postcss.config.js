module.exports = {
    plugins: [
      require('tailwindcss'),
      require('autoprefixer'),
      require('@fullhuman/postcss-purgecss')({
        content: [
          './resources/views/**/*.blade.php',
           './resources/views/**/**/*.blade.php',
           './resources/views/*.blade.php',
           './resources/js/**/*.vue'

        ],
        defaultExtractor: content=>content.match(/[A-Za-z0-9-_:/]+/g) || []
      })
    ]
  }