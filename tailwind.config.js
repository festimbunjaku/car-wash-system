/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./public/**/*.php', './admin/**/*.php', './templates/**/*.php', './includes/**/*.php',
  'node_modules/preline/dist/*.js',
],
  theme: {
    extend: {},
  },
  plugins: [require('preline/plugin'),],
};
