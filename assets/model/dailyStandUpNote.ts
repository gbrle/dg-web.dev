export interface DailyStandUpNoteInterface {
    id: number
    title: string
    content: string
}

export class DailyStandUpNote {
    id: number
    title: string
    content: string

    constructor(data: DailyStandUpNoteInterface) {
        if (data !== null) {
            this.id = data.id
            this.title = data.title
            this.content = data.content
        }
    }
}
