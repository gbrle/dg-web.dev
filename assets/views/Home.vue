<script setup lang="ts">
import { onMounted, ref } from 'vue';
import FormSectionTitleComponent from "@/components/form/FormSectionTitleComponent.vue";

import { EventSourcePolyfill } from 'event-source-polyfill';

const url = new URL("https://mercure.dg-web.fr/.well-known/mercure/");
const options = {
    headers: {
        Authorization:
            "Bearer " + localStorage.getItem('token'),
            "Access-Control-Allow-Origin": "*",
    },
};
const nbNoteDgWeb = ref(0);

onMounted(() => {
    const eventSource = new EventSourcePolyfill(url, options);

    eventSource.onmessage = event => {
        // Sera appelé chaque fois qu'une mise à jour est publiée par le serveur
        console.log(JSON.parse(event.data));
    };
});
</script>

<template>
    <FormSectionTitleComponent title="Bienvenue" />
    <v-card loading>
        <template v-slot:text>
            <p>Il y a actuellement <span :style="{ color: 'red', fontWeight: 'bold' }">{{ nbNoteDgWeb }}</span> note de daily stand up sur DG WEB</p>
        </template>
    </v-card>
</template>