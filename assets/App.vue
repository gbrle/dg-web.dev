<script setup lang="ts">
import { useUtilisateurStore } from '@/stores/utilisateur'
import ConnexionView from '@/views/ConnexionView.vue'
import DashBoardView from '@/views/DashBoardView.vue'

const utilisateurStore = useUtilisateurStore()
</script>

<template>
    <div v-if="!utilisateurStore.isConnected">
        <ConnexionView />
    </div>
    <div v-if="utilisateurStore.isConnected" class="flex-row mh-100">
        <DashBoardView />
    </div>
</template>
