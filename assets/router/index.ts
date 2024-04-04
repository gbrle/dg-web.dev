import { createRouter, createWebHistory } from 'vue-router'

import Home from "@/views/Home.vue";
import ConnexionView from "@/views/ConnexionView.vue";
import DailyStandUpNoteCreationView from "@/views/DailyStandUpNote/DailyStandUpNoteCreationView.vue";
import UtilisateurCreationView from "@/views/Utilisateur/UtilisateurCreationView.vue";
import DashBoardView from "@/views/DashBoardView.vue";

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
            path: '/dashboard',
            name: 'dashboard',
            component: DashBoardView,
            meta: { requiresAuth: true }
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
        {
            path: '/utilisateurs/creation',
            name: 'utilisateurs-creation',
            component: UtilisateurCreationView,
            meta: { requiresAuth: true }
        },
    ],
});

export default router
