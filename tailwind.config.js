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
      backgroundImage: {
        'box1': 'url(/assets/box1.svg)',
        'box2': 'url(/assets/box2.svg)',
        'box3': 'url(/assets/box3.svg)',
        'box4': 'url(/assets/box4.svg)',
        'box5': 'url(/assets/box5.svg)',
        'round3': 'url(/assets/round3.svg)',
        'round2': 'url(/assets/round2.svg)',
        'round1': 'url(/assets/round1.svg)',
        'round4': 'url(/assets/round4.svg)',
        'round5': 'url(/assets/round5.svg)',
        'roundin1': 'url(/assets/roundin1.svg)',
        'roundin2': 'url(/assets/roundin2.svg)',
        'roundin3': 'url(/assets/roundin3.svg)',
        'roundin4': 'url(/assets/roundin4.svg)',
        'roundin5': 'url(/assets/roundin5.svg)',
        'hexa1': 'url(/assets/hexa1.svg)',
        'hexa2': 'url(/assets/hexa2.svg)',
        'hexa3': 'url(/assets/hexa3.svg)',
        'hexa4': 'url(/assets/hexa4.svg)',
        'hexa5': 'url(/assets/hexa5.svg)',
        'sign1': 'url(/assets/sign1.svg)',
        'sign2': 'url(/assets/sign2.svg)',
        'sign3': 'url(/assets/sign3.svg)',
        'sign4': 'url(/assets/sign4.svg)',
        'sign5': 'url(/assets/sign5.svg)',
      },
    },
  },
  plugins: [],
}

