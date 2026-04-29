import { defineConfig } from 'vite';

export default defineConfig({
  build: {
    outDir: 'public/build',
    manifest: true,
    rollupOptions: {
      input: {
        app: 'public/src/js/app.js',
        css: 'public/src/css/app.css'
      }
    }
  }
});
