/** @type {import('tailwindcss').Config} */

export default {
  content: [
    "./resources/**/*.blade.php",
    './resources/**/*.js',
    './resources/**/*.vue',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  theme: {
    extend: {
        animation: {
          pulse: 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
        },
        keyframes: {
          pulse: {
            '0%, 100%': { opacity: '1' },
            '50%': { opacity: '.5' },
          },
        },
        colors: {
          whitePrimary: '#F8FAFF',
          greenPrimary: '#2CD064',
          greenSecondary: '#12984F',
          bluePrimary: '#1C199A',
          grayPrimary: '#B8C2DA',
          graySecondary: '#474741',
        },
        fontSize: {
            'xxs': '10px',
        },
        fontFamily: {
          inter: ['Inter']
        }
    },
  },
  plugins: [],
}

