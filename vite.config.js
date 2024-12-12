import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  server: {
    https: false,  // Habilita HTTPS en el servidor de desarrollo
  },
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
  build: {
    minify: 'esbuild', // Habilitar minificación
  },
});