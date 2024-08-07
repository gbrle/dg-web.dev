<script setup lang="ts">
import {onMounted, ref, watch} from 'vue'
import { DailyStandUpNote } from '@/model/dailyStandUpNote'
import { type Errors } from '@/model/errors'

import { createDailyStandUpNote } from '@/http/request/dailyStandUpNote'
import router from '@/router'
import { toast } from 'vue3-toastify'
import FormSectionTitleComponent from '@/components/form/FormSectionTitleComponent.vue'
import SubmitButtonComponent from "@/components/form/SubmitButtonComponent.vue";
import {requiredRule} from "@/composables/form/validationRoles";
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

const dailyStandUpNote = ref<DailyStandUpNote>(new DailyStandUpNote(null))
const errors = ref<Errors>({})
const editor = ref(ClassicEditor)
const editorConfig = ref(null)
const disabledSubmitButton = ref(true)

watch(() => dailyStandUpNote.value.content, (newValue) => {
    disabledSubmitButton.value = newValue === '';
});

onMounted(() => {
    const currentDate = new Date();
    const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
    const formattedDate = currentDate.toLocaleDateString('fr-FR', options);

    dailyStandUpNote.value.title = formattedDate.charAt(0).toUpperCase() + formattedDate.slice(1);
})

const formSubmitted = () => {
    disabledSubmitButton.value = true
    createDailyStandUpNote(dailyStandUpNote.value)
        .then(() => {
            router.push({ name: 'daily-stand-up-note-liste' })
            toast.success('La note a été créé.')
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
                    :style="{ fontWeight: 700, opacity: 1 + '!important' }"
                    variant="outlined"
                    :rules="[(v) => requiredRule(v)]"
                    v-model="dailyStandUpNote.title"
                    label="Date"
                    placeholder="Entrer le titre de la note"
                    disabled
                ></v-text-field>
            </v-col>
        </v-row>
        <ckeditor
            :editor="editor"
            v-model="dailyStandUpNote.content"
            :config="editorConfig"
        ></ckeditor>
        <SubmitButtonComponent :disabled-submit-button="disabledSubmitButton"></SubmitButtonComponent>
    </v-form>
</template>