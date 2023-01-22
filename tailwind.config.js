/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      colors: {
        test: 'hsl(262, 80%, 50%)',
      },
    },
  },
  plugins: [require("@tailwindcss/forms")],
}
