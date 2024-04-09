<script setup lang="ts">
import { onMounted, ref } from 'vue'

import { Utilisateur } from '@/model/utilisateur'
import { type Errors } from '@/model/errors'
import { getUtilisateurs, patchUtilisateur } from '@/http/request/utilisateur'
import type { Header } from 'vue3-easy-data-table'
import { rolesForSelect } from '@/model/enum/utilisateur/role'
import { toast } from 'vue3-toastify'
import FormSectionTitleComponent from "@/components/form/FormSectionTitleComponent.vue";

const errors = ref<Errors>({})

const search = ref('')
const headers: Header[] = [
    {
        align: 'start',
        key: 'email',
        sortable: true,
        title: 'Nom d\'utilisateur',
    },
    {
        key: 'role',
        title: 'Role',
        sortable: false,
    },
    {
        align: 'end',
        key: 'actions',
        sortable: false,
        title: 'Action'
    },
]
const utilisateurs = ref<Array<Utilisateur>>([])

onMounted(() => {
    getUtilisateurs().then((utilisateurResponse: Array<Utilisateur>) => {
        utilisateurs.value = utilisateurResponse
    })
})
const updateUtilisateur = (item: Utilisateur) => {
    utilisateurs.value[utilisateurs.value.findIndex((utilisateur) => utilisateur.id === item.id)] = item

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
    <FormSectionTitleComponent title="Liste des utilisateurs" />
    <v-card flat>
        <template v-slot:text>
            <v-text-field
                v-model="search"
                label="Rechercher"
                prepend-inner-icon="mdi-magnify"
                variant="outlined"
                hide-details
                clearable
                single-line
            ></v-text-field>
        </template>

        <v-data-table
            :headers="headers"
            :items="utilisateurs"
            :search="search"
        >
            <template v-slot:item.role="{ item }">
            <v-select
                variant="underlined"
                v-model="item.role"
                :items="rolesForSelect.items"
                item-title="libelle"
                item-value="value"
                @update:modelValue="updateUtilisateur(item)"
            ></v-select>
            </template>
        </v-data-table>
    </v-card>
</template>
