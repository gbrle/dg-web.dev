<script setup lang="ts">
import { useUtilisateurStore } from '@/stores/utilisateur'
import router from '@/router'

const utilisateurStore = useUtilisateurStore()

const logout = async () => {
    await utilisateurStore.logout()

    return await router.push({ name: 'connexion' })
}
</script>

<template>
    <a
        href="/api/logout"
        class="rounded-lg hover:bg-gray-100"
        @click="logout"
        v-tooltip="'Déconnexion'"
    >
        <v-icon>mdi-home</v-icon>
    </a>
</template>
