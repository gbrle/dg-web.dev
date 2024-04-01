<script setup lang="ts">
import { useUtilisateurStore } from '@/stores/utilisateur'
import router from '@/router'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

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
        <font-awesome-icon class="mx-auto w-8 h-5 text-gray-500" :icon="['fas', 'power-off']" />
    </a>
</template>
