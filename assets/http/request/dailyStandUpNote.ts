import axios from '@/http/axios'
import { DailyStandUpNote } from '@/model/dailyStandUpNote'

export const createDailyStandUpNote = async (dailyStandUpNote: DailyStandUpNote): Promise<DailyStandUpNote> => {
    const response = await axios.post('/daily-stand-up-notes', dailyStandUpNote)

    return new DailyStandUpNote(response.data)
}

export const updateDailyStandUpNote = async (dailyStandUpNote: DailyStandUpNote): Promise<DailyStandUpNote> => {
    const response = await axios.patch(`/daily-stand-up-notes/${dailyStandUpNote.id}`, dailyStandUpNote)

    return new DailyStandUpNote(response.data)
}

export const getDailyStandUpNoteById = async (id: number): Promise<DailyStandUpNote> => {
    const response = await axios.get(`/daily-stand-up-notes/${id}`)

    return new DailyStandUpNote(response.data)
}
