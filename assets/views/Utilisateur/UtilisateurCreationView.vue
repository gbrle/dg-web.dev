<script setup lang="ts">
import { ref } from 'vue'
import { Utilisateur } from '@/model/utilisateur'
import { type Errors } from '@/model/errors'
import { createUtilisateur } from '@/http/request/utilisateur'
import router from '@/router'
import { toast } from 'vue3-toastify'

const utilisateur = ref<Utilisateur>(new Utilisateur(null))
const visiblePassword = ref(false)
import { requiredRule } from "@/composables/form/validationRoles";
import { rolesForSelect } from "@/model/enum/utilisateur/role";
import FormSectionTitleComponent from "@/components/form/FormSectionTitleComponent.vue";
import SubmitButtonComponent from "@/components/form/SubmitButtonComponent.vue";
const errors = ref<Errors>({})

const formSubmitted = () => {
    createUtilisateur(utilisateur.value)
        .then(() => {
            toast.success('L\'utilisateur a été créé.')

            setTimeout(
                () =>
                    router.push({ name: 'home' }),
                2000
            )
        })
        .catch((errorsResponse) => {
            errors.value = errorsResponse
        })
}

</script>
<template>
    <FormSectionTitleComponent title="Créer un utilisateur"></FormSectionTitleComponent>
    <v-form @submit.prevent="formSubmitted(utilisateur)">
        <v-row>
            <v-col
                cols="12"
                md="4"
            >
                <v-text-field
                    class="col-3"
                    variant="outlined"
                    :rules="[(v) => requiredRule(v)]"
                    v-model="utilisateur.email"
                    label="Nom d'utilisateur"
                    placeholder="Entrer le nom de l'utilisateur"
                    clearable
                ></v-text-field>
            </v-col>
            <v-col
                cols="12"
                md="4"
            >
                <v-text-field
                    variant="outlined"
                    :rules="[(v) => requiredRule(v)]"
                    v-model="utilisateur.password"
                    label="Mot de passe"
                    placeholder="Entrer le mot de passe"
                    :type="visiblePassword ? 'text' : 'password'"
                    :append-inner-icon="visiblePassword ? 'mdi-eye-off' : 'mdi-eye'"
                    @click:append-inner="visiblePassword = !visiblePassword"
                    clearable
                ></v-text-field>
            </v-col>
            <v-col
                cols="12"
                md="4"
            >
                <v-select
                    variant="outlined"
                    v-model="utilisateur.role"
                    :rules="[(v) => requiredRule(v)]"
                    label="Role"
                    :items="rolesForSelect.items"
                    item-title="libelle"
                    item-value="value"
                    clearable
                ></v-select>
            </v-col>
        </v-row>

        <SubmitButtonComponent></SubmitButtonComponent>
    </v-form>
</template>
