import { createRouter, createWebHistory } from 'vue-router'

import DailyStandUpNoteCreationView from "@/views/DailyStandUpNote/DailyStandUpNoteCreationView.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/daily-stand-up-note/creation',
            name: 'daily-stand-up-note-creation',
            component: DailyStandUpNoteCreationView,
        },
    ],
});

export default router
