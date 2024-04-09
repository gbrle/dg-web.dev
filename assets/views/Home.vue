<script setup lang="ts">
import { onMounted } from 'vue';
import FormSectionTitleComponent from "@/components/form/FormSectionTitleComponent.vue";

const eventSource = new EventSource("{{ mercure('https://mercure.dg-web.fr/books/1')|escape('js') }}");

onMounted(() => {
    eventSource.onmessage = event => {
        // Sera appelé chaque fois qu'une mise à jour est publiée par le serveur
        console.log(JSON.parse(event.data));
    };
});
</script>

<template>
    <FormSectionTitleComponent title="Bienvenue" />
    <div class="flex-column justify-content-center align-items-center">
        <div>
            <img
                src="@/images/dg-web-logo.svg"
                alt="dg-web"
                class="img-fluid p-5"
                :style="{ maxWidth: '400px' }"
            >
        </div>
        <p>
            asca
        </p>
    </div>
</template>