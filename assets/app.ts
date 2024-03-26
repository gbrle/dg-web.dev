import { createApp } from 'vue';
import '@/style/app.css';
import App from './App.vue';
import router from './router'
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"

const app = createApp(App);

app.use(router);
app.mount('#vue-app');
