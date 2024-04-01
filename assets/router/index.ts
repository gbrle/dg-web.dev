import { createRouter, createWebHistory } from 'vue-router'

import DailyStandUpNoteCreationView from "@/views/DailyStandUpNote/DailyStandUpNoteCreationView.vue";
import Home from "@/views/Home.vue";
import ConnexionView from "@/views/ConnexionView.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'connexion',
            component: ConnexionView,
            meta: { requiresAuth: false }
        },
        {
            path: '/home',
            name: 'home',
            component: Home,
            meta: { requiresAuth: true }
        },
        {
            path: '/daily-stand-up-note/creation',
            name: 'daily-stand-up-note-creation',
            component: DailyStandUpNoteCreationView,
            meta: { requiresAuth: true }
        },
    ],
});

export default router
