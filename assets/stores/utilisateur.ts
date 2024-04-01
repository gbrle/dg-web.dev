import { defineStore } from 'pinia'
import { Utilisateur } from '@/model/utilisateur'
import { getMe } from '@/http/request/utilisateur'
import { RolesSlug } from '@/model/enum/utilisateur/role'

interface UtilisateurState {
    utilisateur: Utilisateur
}

const initialState = (): UtilisateurState => ({
    utilisateur: new Utilisateur(null)
})

export const useUtilisateurStore = defineStore('utilisateur', {
    state: initialState,
    actions: {
        async loadUtilisateur(): Promise<void> {
            this.utilisateur = await getMe()
        },
        logout(): void {
            Object.assign(this, initialState())
        },
        isGranted(role: string): boolean {
            switch (role) {
                case RolesSlug.ROLE_ADMIN:
                    return this.isAdmin
                default:
                    return false
            }
        }
    },
    getters: {
        isConnected(): boolean {
            return this.utilisateur.connected
        },
        isAdmin(): boolean {
            return this.utilisateur.role === RolesSlug.ROLE_ADMIN
        },
    },
    persist: true
})
