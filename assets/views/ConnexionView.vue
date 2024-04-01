<script setup lang="ts">
import FormComponent from '@/components/form/FormComponent.vue'
import FormGroupComponent from '@/components/form/FormGroupComponent.vue'
import {ref} from "vue";
import router from '@/router'
import { Utilisateur } from "@/model/utilisateur";
import { useUtilisateurStore } from '@/stores/utilisateur'
import PasswordComponent from "@/components/form/PasswordComponent.vue";
import EmailComponent from "@/components/form/EmailComponent.vue";
import axios from '@/http/axios'
const utilisateur = ref<Utilisateur>(new Utilisateur(null))

const utilisateurStore = useUtilisateurStore()

let loginCredentials = {
    username: '',
    password: ''
}

let login = async (credentials) => {
    return axios
        .post('/login_check', credentials)
        .then(response => {
            localStorage.setItem('token', response.data.token)
            utilisateurStore.loadUtilisateur()
            router.push({ name: 'home' })
        })
        .catch(error => {
            // Ici afficher une erreur à l'utilisateur
            console.log(error)
        })
}

const formSubmitted = (utilisateur: Utilisateur) => {
    loginCredentials.username = utilisateur.email
    loginCredentials.password = utilisateur.password

    login(loginCredentials)
}
</script>

<template>
    <div class="vh-100 flex flex-column align-items-center justify-content-center">
        <div class="container flex flex-column align-items-center justify-content-center">
            <img
                src="@/images/dg-web-animated.svg"
                alt="dg-web"
                class="img-fluid mb-7 mr-9"
                :style="{ maxWidth: '700px' }"
            >
        </div>
        <div class="container col-12 col-md-4 col-xl-3 flex flex-column">
            <FormComponent @submit="formSubmitted(utilisateur)" submit-label="Connexion">
                <FormGroupComponent>
                    <EmailComponent
                        class="text-center"
                        v-model="utilisateur.email"
                        label="Email"
                        span="12"
                    />
                    <PasswordComponent
                        class="text-center"
                        v-model="utilisateur.password"
                        label="Mot de passe"
                        span="12"
                    />
                </FormGroupComponent>
            </FormComponent>
        </div>
    </div>
</template>
