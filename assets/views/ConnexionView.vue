<script setup lang="ts">
import { ref } from "vue";
import router from '@/router'
import { Utilisateur } from "@/model/utilisateur";
import { useUtilisateurStore } from '@/stores/utilisateur'
import axios from '@/http/axios'
import { requiredRule } from '@/composables/form/validationRoles'

const utilisateur = ref<Utilisateur>(new Utilisateur(null))
const utilisateurStore = useUtilisateurStore()

const loginCredentials = {
    username: '',
    password: ''
}

const visiblePassword = ref(false)

let login = async (credentials) => {
    return axios
        .post('/login_check', credentials)
        .then(response => {
            localStorage.setItem('token', response.data.token)
            utilisateurStore.loadUtilisateur()
            router.push({ name: 'connexion' })
            router.push({ name: 'home' })
        })
        .catch(error => {
            // Ici afficher une erreur à l'utilisateur
            console.log(error)
        })
}

const formSubmitted = (utilisateur: Utilisateur) => {
    console.log(utilisateur)
    loginCredentials.username = utilisateur.email
    loginCredentials.password = utilisateur.password

    login(loginCredentials)
}
</script>

<template>
    <div class="d-flex align-center justify-center" style="height: 100vh">
        <v-col
            cols="12"
            xs="12"
            sm="10"
            md="6"
            lg="3"
        >
            <img
                class="mb-15 mr-7"
                src="@/images/dg-web-animated.svg"
                min-width="600px"
                alt="dg web"
            >
                <v-form @submit.prevent="formSubmitted(utilisateur)">
                    <v-text-field
                        variant="outlined"
                        :rules="[(v) => requiredRule(v)]"
                        v-model="utilisateur.email"
                        class="mb-2"
                        label="Nom d'utilisateur"
                        placeholder="Entrer le nom d'utilisateur"
                        clearable
                    ></v-text-field>

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

                    <br>

                    <v-btn
                        color="black"
                        size="large"
                        type="submit"
                        variant="elevated"
                        block
                    >
                        Se connecter
                    </v-btn>
                </v-form>
        </v-col>
    </div>
</template>
