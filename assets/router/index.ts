import { createRouter, createWebHistory } from 'vue-router'

import Home from "@/views/Home.vue";
import ConnexionView from "@/views/ConnexionView.vue";
import DailyStandUpNoteCreationView from "@/views/DailyStandUpNote/DailyStandUpNoteCreationView.vue";
import DailyStandUpNoteListeView from "@/views/DailyStandUpNote/DailyStandUpNoteListeView.vue";
import UtilisateurCreationView from "@/views/Utilisateur/UtilisateurCreationView.vue";
import UtilisateurListeView  from "@/views/Utilisateur/UtilisateurListeView.vue";
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
            path: '/daily-stand-up-note/liste',
            name: 'daily-stand-up-note-liste',
            component: DailyStandUpNoteListeView,
            meta: { requiresAuth: true }
        },
        {
            path: '/utilisateurs/creation',
            name: 'utilisateurs-creation',
            component: UtilisateurCreationView,
            meta: { requiresAuth: true }
        },
        {
            path: '/utilisateurs/liste',
            name: 'utilisateurs-liste',
            component: UtilisateurListeView,
            meta: { requiresAuth: true }
        },
    ],
});

export default router
