import axios from '@/http/axios'
import { Utilisateur } from '@/model/utilisateur'

export const getMe = async (): Promise<Utilisateur> => {
    const response = await axios.get('/me')

    return new Utilisateur(response.data)
}
export const getUtilisateurs = async (): Promise<Array<Utilisateur>> => {
    const response = await axios.get('/utilisateurs')

    return response.data.map((utilisateursData: Utilisateur) => new Utilisateur(utilisateursData))
}
export const patchUtilisateur = async (utilisateur: Utilisateur): Promise<Utilisateur> => {
    const response = await axios.patch(`/utilisateurs/${utilisateur.id}`, utilisateur)

    return new Utilisateur(response.data)
}
