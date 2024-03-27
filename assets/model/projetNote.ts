export interface ProjetNoteInterface {
    id: number
    nom: string
}

export class ProjetNote {
    id: number
    nom: string

    constructor(data: ProjetInterface) {
        this.id = data.id
        this.nom = data.nom
    }
}
