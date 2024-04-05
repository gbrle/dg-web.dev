import axios from '@/http/axios'
import { Utilisateur } from '@/model/utilisateur'
import router from '@/router'
import { useUtilisateurStore } from '@/stores/utilisateur'
import {toast} from "vue3-toastify";

export const getMe = async (): Promise<Utilisateur> => {
    const response = await axios.get('/me')

    return new Utilisateur(response.data)
}
export const logout = async (): Promise<Void> => {
    toast.success('Vous allez être déconnecté.')
    setTimeout(() => {
         axios.post('/logout').then(() => {
            localStorage.removeItem('token')
            useUtilisateurStore().logout()
            router.push({ name: 'connexion' })
        })
    }, 2000)
}
export const createUtilisateur = async (utilisateur: Utilisateur): Promise<Array<Utilisateur>> => {
    const response = await axios.post('/utilisateurs/create', utilisateur)

    return response.data.map((utilisateursData: Utilisateur) => new Utilisateur(utilisateursData))
}
export const getUtilisateurs = async (): Promise<Array<Utilisateur>> => {
    const response = await axios.get('/utilisateurs')
console.log(response.data)
    return response.data.map((utilisateursData: Utilisateur) => new Utilisateur(utilisateursData))
}
export const patchUtilisateur = async (utilisateur: Utilisateur): Promise<Utilisateur> => {
    const response = await axios.patch(`/utilisateurs/${utilisateur.id}`, utilisateur)

    return new Utilisateur(response.data)
}
