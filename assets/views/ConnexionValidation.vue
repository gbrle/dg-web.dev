<script setup lang="ts">
import { onMounted } from 'vue'
import { useUtilisateurStore } from '@/stores/utilisateur'
import router from '@/router'
import LoaderComponent from '@/components/loader/LoaderComponent.vue'

const utilisateurStore = useUtilisateurStore()

onMounted(async () => {
    await utilisateurStore.loadUtilisateur()

    await router.push({ name: 'home' })
})
</script>

<template>
    <LoaderComponent />
</template>