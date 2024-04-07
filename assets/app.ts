import { createApp } from 'vue';
import { createPinia } from 'pinia'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
import '@/styles/app.css';
import App from './App.vue';
import router from './router'
import CustomScrollbar from 'custom-vue-scrollbar';
import 'custom-vue-scrollbar/dist/style.css';
import 'animate.css';
import Vue3Toastify from 'vue3-toastify'
import 'vue3-toastify/dist/index.css'
import Vue3EasyDataTable from 'vue3-easy-data-table'
import 'vue3-easy-data-table/dist/style.css';
// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import colors from 'vuetify/util/colors'
import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader


const app = createApp(App);

const vuetify = createVuetify({
    components,
    directives,
    theme: {
        themes: {
            light: {
                dark: false,
                colors: {
                    black: '#000000',
                    primary: '#B55A45',
                    secondary: colors.red.lighten4,
                }
            },
        },
    },
})

const pinia = createPinia()
pinia.use(piniaPluginPersistedstate)
app.use(pinia)
app.use(vuetify)
app.use(router);
app.use(Vue3Toastify, {
    autoClose: 3000
} as any)
app.mount('#vue-app');
app.component(CustomScrollbar.name, CustomScrollbar);
app.component('EasyDataTable', Vue3EasyDataTable)

declare module 'vue' {
    export interface GlobalComponents {
        CustomScrollbar: typeof CustomScrollbar;
    }
}