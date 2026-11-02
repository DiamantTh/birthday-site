/** @type {import('tailwindcss').Config} */
export default {
  content: ['./src/**/*.{html,js,svelte}'],
  theme: {
    extend: {
      colors: {
        sunset: '#ff7b54',
        peach: '#ffd6a5',
        lilac: '#c9b6ff',
        mist: '#f3f4ff',
        midnight: '#1f1630'
      },
      boxShadow: {
        glow: '0 20px 60px rgba(255, 123, 84, 0.35)'
      }
    }
  },
  plugins: []
};
