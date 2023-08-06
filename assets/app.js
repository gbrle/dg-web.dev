/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import { createApp } from 'vue';
import App from './js/App.vue';
import { createRouter, createWebHistory } from 'vue-router';

import Home from './js/components/Home.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/page/home', component: Home },
    ],
    mode: 'history',
});

const app = createApp(App);
app.use(router);
app.mount('#vue-app');
