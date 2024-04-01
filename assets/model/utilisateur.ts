export class Utilisateur {
    id: number | null = null
    email: string | null = null
    role: string | null = null
    connected: boolean = false

    constructor(data: any | null) {
        if (data !== null) {
            this.id = data.id
            this.email = data.email
            this.role = data.role
            this.connected = true
        }
    }
}
