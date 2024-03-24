import { defineConfig } from "vite";
import symfonyPlugin from "vite-plugin-symfony";
import vue from '@vitejs/plugin-vue'
import {fileURLToPath, URL} from "node:url";
import vueJsx from '@vitejs/plugin-vue-jsx'

export default defineConfig({
    server: {
        host: '0.0.0.0',
        hmr: {
            host: 'localhost'
        }
    },
    plugins: [
        symfonyPlugin(),
        vue(),
        vueJsx(),
    ],
    resolve: {
        alias: {
            '@': fileURLToPath(new URL('./assets', import.meta.url))
        }
    },
    build: {
        rollupOptions: {
            input: {
                app: "./assets/app.ts"
            },
        }
    },
});
