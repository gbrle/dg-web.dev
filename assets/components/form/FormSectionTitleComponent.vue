<script setup lang="ts">
import {inject} from "vue";

const $isMobile = inject('$isMobile');

defineProps({
    title: {
        type: String,
        required: true
    }
})
</script>
<template>
        <v-system-bar
            style="border-bottom: 1px solid #dee0de"
            height="0"
            window
        >
            <p v-if="$isMobile"
               :style="{ position: 'absolute', bottom: '-42px', right: '15px'}"
            >
                <v-card :title="title"></v-card>
            </p>
            <p
                v-else
                :style="{ position: 'absolute', bottom: '-50px', right: '65px'}"
            >
                <v-card :title="title"></v-card>
            </p>
            <v-spacer></v-spacer>
        </v-system-bar>
</template>
