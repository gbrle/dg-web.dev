<script setup lang="ts">
import { useUtilisateurStore } from '@/stores/utilisateur'
import ConnexionView from '@/views/ConnexionView.vue'
import DashBoardView from '@/views/DashBoardView.vue'
import {onMounted} from "vue";

const utilisateurStore = useUtilisateurStore()

onMounted(() => {
    utilisateurStore.loadUtilisateur()
})
</script>

<template>
    <div v-if="!utilisateurStore.isConnected">
        <ConnexionView />
    </div>
    <div v-if="utilisateurStore.isConnected">
        <DashBoardView />
    </div>
</template>
