import { createApp } from 'vue';
import { createPinia } from 'pinia'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
import '@/styles/app.css';
import App from './App.vue';
import router from './router'
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
import CustomScrollbar from 'custom-vue-scrollbar';
import 'custom-vue-scrollbar/dist/style.css';
import 'animate.css';
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import Vue3Toastify from 'vue3-toastify'
import 'vue3-toastify/dist/index.css'
import Vue3EasyDataTable from 'vue3-easy-data-table'
import 'vue3-easy-data-table/dist/style.css';

import {
    faTableColumns,
    faPowerOff,
    faFileCirclePlus,
    faUsersGear,
    faGear,
    faChevronDown,
    faChevronUp,
    faMapLocationDot,
    faList,
    faXmark,
    faHouseFlag,
    faArrowsToEye,
    faBars,
    faArrowsLeftRight,
    faSquareCaretLeft,
    faSquareCaretRight,
    faChevronRight,
    faBook,
    faUser,
    faRightFromBracket,
    faPlus
} from '@fortawesome/free-solid-svg-icons'

library.add(
    faTableColumns,
    faPowerOff,
    faFileCirclePlus,
    faUsersGear,
    faGear,
    faChevronDown,
    faChevronUp,
    faMapLocationDot,
    faList,
    faXmark,
    faHouseFlag,
    faArrowsToEye,
    faBars,
    faArrowsLeftRight,
    faSquareCaretLeft,
    faSquareCaretRight,
    faChevronRight,
    faBook,
    faUser,
    faRightFromBracket,
    faPlus
)
const app = createApp(App);

const pinia = createPinia()
pinia.use(piniaPluginPersistedstate)
app.use(pinia)
app.use(router);
app.use(Vue3Toastify, {
    autoClose: 3000
} as any)
app.mount('#vue-app');
app.component(CustomScrollbar.name, CustomScrollbar);
app.component('font-awesome-icon', FontAwesomeIcon)
app.component('EasyDataTable', Vue3EasyDataTable)

declare module 'vue' {
    export interface GlobalComponents {
        CustomScrollbar: typeof CustomScrollbar;
    }
}