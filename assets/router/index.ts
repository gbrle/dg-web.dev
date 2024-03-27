import { createRouter, createWebHistory } from 'vue-router'

import Home from '@/views/Home.vue';
import Note from '@/views/Note/Note.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/notes',
            name: 'notes',
            component: Note
        },
    ],
});

export default router
