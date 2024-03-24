export interface ProjetInterface {
    id: number
    nom: string
}

export class Projet {
    id: number
    nom: string

    constructor(data: ProjetInterface) {
        this.id = data.id
        this.nom = data.nom
    }
}
