<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { type Errors } from '@/model/errors'
import FormSectionTitleComponent from '@/components/form/FormSectionTitleComponent.vue'
import { DailyStandUpNote } from "@/model/dailyStandUpNote";
import { getDailyStandUpNotes } from "@/http/request/dailyStandUpNote";
const errors = ref<Errors>({})

const dailyStandUpNotes = ref<Array<DailyStandUpNote>>([])

onMounted(() => {
    getDailyStandUpNotes().then((dailyStandUpNoteResponse: Array<DailyStandUpNote>) => {
        dailyStandUpNotes.value = dailyStandUpNoteResponse
    })
})
</script>
<template >
    <FormSectionTitleComponent title="Liste des daily's stand up" />

    <v-expansion-panels>
        <v-expansion-panel
            v-for="dailyStandUpNote in dailyStandUpNotes"
            :key="dailyStandUpNote"
            :title="dailyStandUpNote.title"
        >
            <template v-slot:text>
                <div v-html="dailyStandUpNote.content"></div>
            </template>
        </v-expansion-panel>
    </v-expansion-panels>
</template>
