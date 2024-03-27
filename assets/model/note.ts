export interface NoteInterface {
    id: number
    content: string
}

export class Note {
    id: number
    content: string

    constructor(data: NoteInterface) {
        this.id = data.id
        this.content = data.content
    }
}
