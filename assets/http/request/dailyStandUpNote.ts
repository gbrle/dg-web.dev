import axios from '@/http/axios'
import { DailyStandUpNote } from '@/model/dailyStandUpNote'
import {Utilisateur} from "@/model/utilisateur";

export const createDailyStandUpNote = async (dailyStandUpNote: DailyStandUpNote): Promise<DailyStandUpNote> => {
    const response = await axios.post('/daily-stand-up-notes', dailyStandUpNote)

    return new DailyStandUpNote(response.data)
}

export const getDailyStandUpNotes = async (): Promise<Array<DailyStandUpNote>> => {
    const response = await axios.get('/daily-stand-up-notes')

    return response.data.map((dailyStandUpNotesData: DailyStandUpNote) => new DailyStandUpNote(dailyStandUpNotesData))
}

export const updateDailyStandUpNote = async (dailyStandUpNote: DailyStandUpNote): Promise<DailyStandUpNote> => {
    const response = await axios.patch(`/daily-stand-up-notes/${dailyStandUpNote.id}`, dailyStandUpNote)

    return new DailyStandUpNote(response.data)
}
export const deleteDailyStandUpNote = async (dailyStandUpNote: DailyStandUpNote): Promise<DailyStandUpNote> => {
    const response = await axios.delete(`/daily-stand-up-notes/${dailyStandUpNote.id}`)

    return response.data
}

export const getDailyStandUpNoteById = async (id: number): Promise<DailyStandUpNote> => {
    const response = await axios.get(`/daily-stand-up-notes/${id}`)

    return new DailyStandUpNote(response.data)
}
