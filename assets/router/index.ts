import { createRouter, createWebHistory } from 'vue-router'

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
