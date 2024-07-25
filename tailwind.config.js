/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      gridTemplateColumns: {
        'cb': 'repeat(16, minmax(0, 1fr))', // 4 columns
      },
    },
  },
  plugins: [],
}

