import { createApp } from 'vue';
import '@/styles/app.css';
import App from './App.vue';
import router from './router'
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"

import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

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
    faHouseFlag
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
    faHouseFlag
)
const app = createApp(App);

app.use(router);
app.mount('#vue-app');
app.component('font-awesome-icon', FontAwesomeIcon)
