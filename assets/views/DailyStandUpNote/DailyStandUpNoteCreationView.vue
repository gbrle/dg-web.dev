<script setup lang="ts">
import {onMounted, ref} from 'vue'
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

onMounted(() => {
    const currentDate = new Date();
    const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
    const formattedDate = currentDate.toLocaleDateString('fr-FR', options);

    dailyStandUpNote.value.title = formattedDate.charAt(0).toUpperCase() + formattedDate.slice(1);
})

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
                    disabled
                    clearable
                ></v-text-field>
            </v-col>
<!--            <v-col-->
<!--                cols="12"-->
<!--            >-->
<!--                <v-textarea-->
<!--                    variant="outlined"-->
<!--                    :rules="[(v) => requiredRule(v)]"-->
<!--                    v-model="dailyStandUpNote.content"-->
<!--                    label="Description"-->
<!--                    placeholder="Description de la note"-->
<!--                    clearable-->
<!--                ></v-textarea>-->
<!--            </v-col>-->
        </v-row>
        <ckeditor :editor="editor"
                  v-model="dailyStandUpNote.content"
                  :config="editorConfig"
        ></ckeditor>
        <SubmitButtonComponent></SubmitButtonComponent>
    </v-form>
</template>

<style>
.ck.ck-balloon-panel.ck-powered-by-balloon[class*=position_border] {
    display: none!important;
}
</style>