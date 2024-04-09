<script setup lang="ts">
import { ref } from 'vue'
import { DailyStandUpNote } from '@/model/dailyStandUpNote'
import { type Errors } from '@/model/errors'

import { createDailyStandUpNote } from '@/http/request/dailyStandUpNote'
import router from '@/router'
import { toast } from 'vue3-toastify'
import FormSectionTitleComponent from '@/components/form/FormSectionTitleComponent.vue'
import SubmitButtonComponent from "@/components/form/SubmitButtonComponent.vue";
import {requiredRule} from "@/composables/form/validationRoles";

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
<template >
    <FormSectionTitleComponent title="Création d'une note daily stand up" />
    <v-form @submit.prevent="formSubmitted">
        <v-row>
            <v-col
                cols="12"
            >
                <v-text-field
                    variant="outlined"
                    :rules="[(v) => requiredRule(v)]"
                    v-model="dailyStandUpNote.title"
                    label="Titre"
                    placeholder="Entrer le titre de la note"
                    clearable
                ></v-text-field>
            </v-col>
            <v-col
                cols="12"
            >
                <v-textarea
                    variant="outlined"
                    :rules="[(v) => requiredRule(v)]"
                    v-model="dailyStandUpNote.content"
                    label="Description"
                    placeholder="Description de la note"
                    clearable
                ></v-textarea>
            </v-col>
        </v-row>

        <SubmitButtonComponent></SubmitButtonComponent>
    </v-form>
</template>
