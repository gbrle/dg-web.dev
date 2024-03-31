<script setup lang="ts">
import { ref } from 'vue'
import FormComponent from '@/components/form/FormComponent.vue'
import { DailyStandUpNote } from '@/model/dailyStandUpNote'
import { type Errors } from '@/model/errors'

import { createDailyStandUpNote } from '@/http/request/dailyStandUpNote'
import router from '@/router'
import { toast } from 'vue3-toastify'
import FormGroupComponent from '@/components/form/FormGroupComponent.vue'
import FormSectionTitleComponent from '@/components/form/FormSectionTitleComponent.vue'
import InputComponent from "@/components/form/InputComponent.vue";

const dailyStandUpNote = ref<DailyStandUpNote>(new DailyStandUpNote(null))
const errors = ref<Errors>({})

const formSubmitted = () => {
    createDailyStandUpNote(dailyStandUpNote.value)
        .then((dailyStandUpNoteResponse: DailyStandUpNote) => {
            toast.success('La note a été créé.')

            setTimeout(
                () =>
                    router.push({ name: 'daily-stand-up-note-edition', params: { dailyStandUpNoteId: dailyStandUpNoteResponse.id } }),
                2000
            )
        })
        .catch((errorsResponse) => {
            errors.value = errorsResponse
        })
}

</script>
<template>
    <FormComponent @submit="formSubmitted" submit-label="Créer la note">
        <FormSectionTitleComponent title="Création d'une note daily stand up" />
        <FormGroupComponent>
            <InputComponent
                v-model="dailyStandUpNote.title"
                :errors="errors.title"
                label="Titre"
                span="4"
            />
            <InputComponent
                v-model="dailyStandUpNote.content"
                :errors="errors.content"
                label="Description"
                span="4"
            />
        </FormGroupComponent>
    </FormComponent>
</template>
