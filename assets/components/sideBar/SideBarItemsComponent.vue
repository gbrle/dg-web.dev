<script setup lang="ts">
import { ref } from 'vue'
import router from '@/router'
import { logout } from '@/http/request/utilisateur'

const open = ref(['Users'])
</script>

<template>
    <v-list>
        <v-list-item
            prepend-avatar="https://randomuser.me/api/portraits/women/85.jpg"
            subtitle="sandra_a88@gmailcom"
            title="Sandra Adams"
        ></v-list-item>
    </v-list>

    <v-divider></v-divider>

    <v-list v-model:opened="open" >
        <!-- Daily standUp Note -->
        <v-list-group value="Daily standUp Note">
            <template v-slot:activator="{ props }">
                <v-list-item
                    v-bind="props"
                    prepend-icon="mdi-note-text-outline"
                    title="Daily standUp Note"
                ></v-list-item>
            </template>
            <v-list-item
                prepend-icon="mdi-plus-outline"
                title="Créer"
                @click="router.push({ name: 'daily-stand-up-note-creation' })"
            ></v-list-item>
            <v-list-item
                prepend-icon="mdi-plus-outline"
                title="Lister"
                @click="router.push({ name: 'daily-stand-up-note-liste' })"
            ></v-list-item>
        </v-list-group>
        <!-- Utilisateur -->
        <v-list-group value="Utilisateur">
            <template v-slot:activator="{ props }">
                <v-list-item
                    v-bind="props"
                    prepend-icon="mdi-account"
                    title="Utilisateur"
                ></v-list-item>
            </template>
            <v-list-item
                prepend-icon="mdi-plus-outline"
                title="Créer"
                @click="router.push({ name: 'utilisateurs-creation' })"
            ></v-list-item>
            <v-list-item
                prepend-icon="mdi-eye-outline"
                title="Lister"
                @click="router.push({ name: 'utilisateurs-liste' })"
            ></v-list-item>
        </v-list-group>
    </v-list>
</template>
