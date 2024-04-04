<script setup lang="ts">
import { ref } from 'vue'
import FormComponent from '@/components/form/FormComponent.vue'
import { Utilisateur } from '@/model/utilisateur'
import { type Errors } from '@/model/errors'

import { createUtilisateur } from '@/http/request/utilisateur'
import router from '@/router'
import { toast } from 'vue3-toastify'
import FormGroupComponent from '@/components/form/FormGroupComponent.vue'
import FormSectionTitleComponent from '@/components/form/FormSectionTitleComponent.vue'
import InputComponent from "@/components/form/InputComponent.vue";

const utilisateur = ref<Utilisateur>(new Utilisateur(null))
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
    <FormComponent @submit="formSubmitted" submit-label="Créer l'utilisateur">
        <FormSectionTitleComponent title="Création d'un utilisateur" />
        <FormGroupComponent>
            <InputComponent
                v-model="utilisateur.email"
                :errors="errors.email"
                label="Pseudo"
                span="4"
            />
            <InputComponent
                v-model="utilisateur.password"
                :errors="errors.password"
                label="Mot de passe"
                span="4"
            />
        </FormGroupComponent>
    </FormComponent>
</template>
