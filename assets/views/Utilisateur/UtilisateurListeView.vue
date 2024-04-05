<script setup lang="ts">
import { onMounted, ref } from 'vue'

import { Utilisateur } from '@/model/utilisateur'
import { type Errors } from '@/model/errors'
import { getUtilisateurs, patchUtilisateur } from '@/http/request/utilisateur'
import type { Header } from 'vue3-easy-data-table'
import SelectComponent from '@/components/form/SelectComponent.vue'
import { RolesLibelle } from '@/model/enum/utilisateur/role'
import { toast } from 'vue3-toastify'

const utilisateurs = ref<Array<Utilisateur>>([])
const errors = ref<Errors>({})
const headers: Header[] = [
    { text: 'Email', value: 'email' },
    { text: 'Rôle', value: 'role' },
    { text: 'Action', value: '' }
]

onMounted(() => {
    getUtilisateurs().then((utilisateurResponse: Array<Utilisateur>) => {
        utilisateurs.value = utilisateurResponse
    })
})
const updateUtilisateur = (item: Utilisateur) => {
    console.log(item)
    utilisateurs.value[utilisateurs.value.findIndex((utilisateur) => utilisateur.id === item.id)] =
        item

    patchUtilisateur(item)
        .then(() => {
            toast.success('Les modifications ont été enregistrées.')
        })
        .catch((errorsResponse) => {
            errors.value = errorsResponse
        })
}
</script>
<template>
    <EasyDataTable
        :headers="headers"
        :items="utilisateurs"
        alternating
        rows-per-page-message="Utilisateurs par page"
        rows-of-page-separator-message="sur"
        :sort-by="['email']"
        :sort-type="['asc']"
    >
        <template #item-email="item"> {{ item.email }} </template>
        <template #item-role="item">
            <SelectComponent
                class="w-3/6"
                v-model="item.role"
                :errors="errors.role"
                :choicesEnum="RolesLibelle"
                @change="updateUtilisateur(item)"
                span="2"
                :clearable="false"
            />
        </template>
    </EasyDataTable>
</template>
