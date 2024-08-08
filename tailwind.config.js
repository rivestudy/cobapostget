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
  plugins: [
    function ({ addComponents }) {
      addComponents({
        '.box': {
          width: '100%',
          aspectRatio: '4.5',
          position: 'relative',
          zIndex: '0',
        },
        '.boxb': {
          display: 'inline-block',
          width: '100%',
          aspectRatio: '4.5',
          clipPath: 'polygon(0 0px,0px 0,calc(100% - 0px) 0,100% 0px,100% calc(100% - 0px),calc(100% - 0px) 100%,0px 100%,0 calc(100% - 0px),0 0px,5px  calc(0px + 2.07px),5px calc(100% - 0px - 2.07px),calc(0px + 2.07px) calc(100% - 5px),calc(100% - 0px - 2.07px) calc(100% - 5px),calc(100% - 5px) calc(100% - 0px - 2.07px),calc(100% - 5px) calc(0px + 2.07px),calc(100% - 0px - 2.07px) 5px,calc(0px + 2.07px) 5px,5px calc(0px + 2.07px))',
        },
        '.boxcb': {
          width: '100%',
          aspectRatio: '4.5',
          position: 'relative',
          zIndex: '0',
          '--g': '#0000 calc(98% - 10px), #000 calc(100% - 10px) 98%, #0000',
          '--mask': 'radial-gradient(40px at 40px 40px, #0000 calc(98% - 5px), #000 calc(100% - 5px) 98%, #0000) -40px -40px,' +
            'linear-gradient(90deg, #000 10px, #0000 0) -5px 50% /100% calc(100% - 80px + 5px) repeat-x,' +
            'linear-gradient(#000 10px, #0000 0) 50% -5px/calc(100% - 80px + 5px) 100% repeat-y',
          '-webkit-mask': 'var(--mask)',
          mask: 'var(--mask)',
        },
        '.boxc': {
          display: 'inline-block',
          width: '100%',
          aspectRatio: '4.5',
          '-webkit-mask': 'radial-gradient(circle 30px at top left, #0000 98%, #000) top left,' +
            'radial-gradient(circle 30px at top right, #0000 98%, #000) top right,' +
            'radial-gradient(circle 30px at bottom left, #0000 98%, #000) bottom left,' +
            'radial-gradient(circle 30px at bottom right, #0000 98%, #000) bottom right',
          '-webkit-mask-size': '51% 51%',
          '-webkit-mask-repeat': 'no-repeat',
        },
        '.box40': {
          display: 'inline-block',
          width: '390px',
          aspectRatio: '4.5',
          '--mask': 'conic-gradient(from -65deg at top 20px left 20px, #000, #0000 1deg 39deg, #000 40deg) 0 0 /51% 51% no-repeat,' +
            'conic-gradient(from 25deg at top 20px right 20px, #000, #0000 1deg 39deg, #000 40deg) 100% 0 /51% 51% no-repeat,' +
            'conic-gradient(from 115deg at bottom 20px right 20px, #000, #0000 1deg 39deg, #000 40deg) 100% 100%/51% 51% no-repeat,' +
            'conic-gradient(from -155deg at bottom 20px left 20px, #000, #0000 1deg 39deg, #000 40deg) 0 100%/51% 51% no-repeat',
          '-webkit-mask': 'var(--mask)',
          mask: 'var(--mask)',
        },
        '.box60': {
          display: 'inline-block',
          width: '100%',
          aspectRatio: '4.5',
          '--mask': 'conic-gradient(from -75deg at top 20px left 20px, #000, #0000 1deg 59deg, #000 60deg) 0 0 /51% 51% no-repeat,' +
            'conic-gradient(from 15deg at top 20px right 20px, #000, #0000 1deg 59deg, #000 60deg) 100% 0 /51% 51% no-repeat,' +
            'conic-gradient(from 105deg at bottom 20px right 20px, #000, #0000 1deg 59deg, #000 60deg) 100% 100%/51% 51% no-repeat,' +
            'conic-gradient(from -165deg at bottom 20px left 20px, #000, #0000 1deg 59deg, #000 60deg) 0 100%/51% 51% no-repeat',
          '-webkit-mask': 'var(--mask)',
          mask: 'var(--mask)',
        },
        '.box90': {
          display: 'inline-block',
          width: '390px',
          aspectRatio: '4.5',
          '--mask': 'conic-gradient(at 40px 40px, #000 75%, #0000 0) -20px -20px',
          '-webkit-mask': 'var(--mask)',
          mask: 'var(--mask)',
        },
        '.box150': {
          display: 'inline-block',
          width: '390px',
          aspectRatio: '4.5',
          '--mask': 'conic-gradient(from -120deg at top 20px left 20px, #000, #0000 1deg 149deg, #000 150deg) 0 0 /51% 51% no-repeat,' +
            'conic-gradient(from -30deg at top 20px right 20px, #000, #0000 1deg 149deg, #000 150deg) 100% 0 /51% 51% no-repeat,' +
            'conic-gradient(from 60deg at bottom 20px right 20px, #000, #0000 1deg 149deg, #000 150deg) 100% 100%/51% 51% no-repeat,' +
            'conic-gradient(from -210deg at bottom 20px left 20px, #000, #0000 1deg 149deg, #000 150deg) 0 100%/51% 51% no-repeat',
          '-webkit-mask': 'var(--mask)',
          mask: 'var(--mask)',
        },
        '.box180': {
          display: 'inline-block',
          width: '390px',
          aspectRatio: '4.5',
          '--mask': 'conic-gradient(from 45deg at 40px 40px, #000 75%, #0000 0) -40px 0/100% 51% repeat-x,' +
            'conic-gradient(from 135deg at 40px calc(100% - 40px), #0000 25%, #000 0) -40px 100%/100% 51% repeat-x',
          '-webkit-mask': 'var(--mask)',
          mask: 'var(--mask)',
        },
        '.box40b': {
          display: 'inline-block',
          width: '100%',
          aspectRatio: '4.5',
          clipPath: 'polygon(0 10.67px, 20px 20px, 10.67px 0, calc(100% - 10.67px) 0, calc(100% - 20px) 20px, 100% 10.67px, 100% calc(100% - 10.67px), calc(100% - 20px) calc(100% - 20px), calc(100% - 10.67px) 100%, 10.67px 100%, 20px calc(100% - 20px), 0 calc(100% - 10.67px), 0 10.67px, 5px calc(10.67px + 7.85px), 5px calc(100% - 10.67px - 7.85px), calc(20px + 10.34px) calc(100% - 20px - 10.34px), calc(10.67px + 7.85px) calc(100% - 5px), calc(100% - 10.67px - 7.85px) calc(100% - 5px), calc(100% - 20px - 10.34px) calc(100% - 20px - 10.34px), calc(100% - 5px) calc(100% - 10.67px - 7.85px), calc(100% - 5px) calc(10.67px + 7.85px), calc(100% - 20px - 10.34px) calc(20px + 10.34px), calc(100% - 10.67px - 7.85px) 5px, calc(10.67px + 7.85px) 5px, calc(20px + 10.34px) calc(20px + 10.34px), 5px calc(10.67px + 7.85px))',
        },
        '.box60b': {
          display: 'inline-block',
          width: '100%',
          aspectRatio: '4.5',
          clipPath: 'polygon(0 14.64px, 20px 20px, 14.64px 0, calc(100% - 14.64px) 0, calc(100% - 20px) 20px, 100% 14.64px, 100% calc(100% - 14.64px), calc(100% - 20px) calc(100% - 20px), calc(100% - 14.64px) 100%, 14.64px 100%, 20px calc(100% - 20px), 0 calc(100% - 14.64px), 0 14.64px, 5px calc(14.64px + 6.52px), 5px calc(100% - 14.64px - 6.52px), calc(20px + 7.07px) calc(100% - 20px - 7.07px), calc(14.64px + 6.52px) calc(100% - 5px), calc(100% - 14.64px - 6.52px) calc(100% - 5px), calc(100% - 20px - 7.07px) calc(100% - 20px - 7.07px), calc(100% - 5px) calc(100% - 14.64px - 6.52px), calc(100% - 5px) calc(14.64px + 6.52px), calc(100% - 20px - 7.07px) calc(20px + 7.07px), calc(100% - 14.64px - 6.52px) 5px, calc(14.64px + 6.52px) 5px, calc(20px + 7.07px) calc(20px + 7.07px), 5px calc(14.64px + 6.52px))',
        },
        '.box90b': {
          display: 'inline-block',
          width: '100%',
          aspectRatio: '4.5',
          clipPath: 'polygon(0 20px, 20px 20px, 20px 0, calc(100% - 20px) 0, calc(100% - 20px) 20px, 100% 20px, 100% calc(100% - 20px), calc(100% - 20px) calc(100% - 20px), calc(100% - 20px) 100%, 20px 100%, 20px calc(100% - 20px), 0 calc(100% - 20px), 0 20px, 5px calc(20px + 5px), 5px calc(100% - 20px - 5px), calc(20px + 5px) calc(100% - 20px - 5px), calc(20px + 5px) calc(100% - 5px), calc(100% - 20px - 5px) calc(100% - 5px), calc(100% - 20px - 5px) calc(100% - 20px - 5px), calc(100% - 5px) calc(100% - 20px - 5px), calc(100% - 5px) calc(20px + 5px), calc(100% - 20px - 5px) calc(20px + 5px), calc(100% - 20px - 5px) 5px, calc(20px + 5px) 5px, calc(20px + 5px) calc(20px + 5px), 5px calc(20px + 5px))',
        },
        '.box120b': {
          display: 'inline-block',
          width: '100%',
          aspectRatio: '4.5',
          clipPath: 'polygon(0 25.36px, 20px 20px, 25.36px 0, calc(100% - 25.36px) 0, calc(100% - 20px) 20px, 100% 25.36px, 100% calc(100% - 25.36px), calc(100% - 20px) calc(100% - 20px), calc(100% - 25.36px) 100%, 25.36px 100%, 20px calc(100% - 20px), 0 calc(100% - 25.36px), 0 25.36px, 5px calc(25.36px + 3.84px), 5px calc(100% - 25.36px - 3.84px), calc(20px + 4.08px) calc(100% - 20px - 4.08px), calc(25.36px + 3.84px) calc(100% - 5px), calc(100% - 25.36px - 3.84px) calc(100% - 5px), calc(100% - 20px - 4.08px) calc(100% - 20px - 4.08px), calc(100% - 5px) calc(100% - 25.36px - 3.84px), calc(100% - 5px) calc(25.36px + 3.84px), calc(100% - 20px - 4.08px) calc(20px + 4.08px), calc(100% - 25.36px - 3.84px) 5px, calc(25.36px + 3.84px) 5px, calc(20px + 4.08px) calc(20px + 4.08px), 5px calc(25.36px + 3.84px))',
        },
        '.box180b': {
          display: 'inline-block',
          width: '100%',
          aspectRatio: '4.5',
          clipPath: 'polygon(0 40px, 40px 0, calc(100% - 40px) 0, 100% 40px, 100% calc(100% - 40px), calc(100% - 40px) 100%, 40px 100%, 0 calc(100% - 40px), 0 40px, 5px calc(40px + 2.07px), 5px calc(100% - 40px - 2.07px), calc(40px + 2.07px) calc(100% - 5px), calc(100% - 40px - 2.07px) calc(100% - 5px), calc(100% - 5px) calc(100% - 40px - 2.07px), calc(100% - 5px) calc(40px + 2.07px), calc(100% - 40px - 2.07px) 5px, calc(40px + 2.07px) 5px, 5px calc(40px + 2.07px))',
        },
        '.boxz': {
          display: 'inline-block',
          width: '100%',
          aspectRatio: '4.5',
          '--mask': 'conic-gradient(from 135deg at top, #0000, #000 1deg 89deg, #0000 90deg) top/20px 51% repeat-x,' +
            'conic-gradient(from -45deg at bottom, #0000, #000 1deg 89deg, #0000 90deg) bottom/20px 51% repeat-x',
          '-webkit-mask': 'var(--mask)',
          mask: 'var(--mask)',
        },
        '.boxri': {
          display: 'inline-block',
          width: '100%',
          aspectRatio: '4.5',
          '--mask': 'radial-gradient(10px at 50% 10px, #0000 97%, #000) 50% -10px/18.5px 100%',
          '-webkit-mask': 'var(--mask)',
          mask: 'var(--mask)',
        },
        '.boxro': {
          display: 'inline-block',
          width: '100%',
          aspectRatio: '4.5',
          '--mask': 'linear-gradient(0deg, #0000 20px, #000 0) 0 10px,' +
            'radial-gradient(10px, #000 98%, #0000) 50%/18.5px 20px repeat space',
          '-webkit-mask': 'var(--mask)',
          mask: 'var(--mask)',
        },
        '.boxrb': {
          display: 'inline-block',
          width: '100%',
          aspectRatio: '4.5',
          '--mask': 'radial-gradient(5px at 25% 0, #0000 98%, #000) 50% 5px/20px 51% repeat-x,' +
            'radial-gradient(5px at 75% 50%, #000 99%, #0000 101%) top/20px 10px repeat-x,' +
            'radial-gradient(5px at 75% 100%, #0000 98%, #000) calc(50% + 10px) calc(100% - 5px)/20px 51% repeat-x,' +
            'radial-gradient(5px at 25% 50%, #000 99%, #0000 101%) calc(50% + 10px) 100%/20px 10px repeat-x',
          '-webkit-mask': 'var(--mask)',
          mask: 'var(--mask)',
        },
      }
      )
    },
  ],
}

