<script setup lang="ts">
import { ref, onMounted, nextTick } from 'vue'
import { type Errors } from '@/model/errors'
import FormSectionTitleComponent from '@/components/form/FormSectionTitleComponent.vue'
import ConfirmModal from '@/components/modal/ConfirmModal.vue'
import { DailyStandUpNote } from "@/model/dailyStandUpNote";
import { getDailyStandUpNotes, deleteDailyStandUpNote } from "@/http/request/dailyStandUpNote";
import { toast } from "vue3-toastify";
import LoaderComponent from "@/components/loader/LoaderComponent.vue";

const errors = ref<Errors>({})
const isLoading = ref(true);
const dailyStandUpNotes = ref<Array<DailyStandUpNote>>([])
const dailyStandUpNoteToDelete = ref<DailyStandUpNote | null>(null)
const isModalDeleteOpen = ref<Boolean>(false)
const openFirstDailyStandUpNote = ref<Array>([0])

const deleteItem = () => {
    deleteDailyStandUpNote(dailyStandUpNoteToDelete.value).then(() => {
        toast.success('La note a été supprimée.')
        dailyStandUpNoteToDelete.value = null
        isModalDeleteOpen.value = false
    }).catch((error: Errors) => {
        errors.value = error
    })
    dailyStandUpNoteToDelete.value = null
}

const deleteItemConfirm = (dailyStandUpNote: DailyStandUpNote) => {
    dailyStandUpNoteToDelete.value = dailyStandUpNote
    isModalDeleteOpen.value = true
}

const deleteItemClose = () => {
    dailyStandUpNoteToDelete.value = null
}

onMounted(() => {
    getDailyStandUpNotes().then((dailyStandUpNoteResponse: Array<DailyStandUpNote>) => {
        dailyStandUpNotes.value = dailyStandUpNoteResponse
    }).finally(() => {
        isLoading.value = false;
    })
})
</script>
<template>
    <div v-if="isLoading">
        <LoaderComponent />
    </div>
    <div v-else-if="dailyStandUpNotes.length === 0">
        <FormSectionTitleComponent title="Liste des daily's stand up" />
        <v-alert
            type="warning"
            outlined
            dense
        >
            Aucune note daily stand up n'a été créée.
        </v-alert>
    </div>
    <div v-else>
        <FormSectionTitleComponent title="Liste des daily's stand up" />
        <v-expansion-panels v-model="openFirstDailyStandUpNote">
            <v-expansion-panel
                v-for="dailyStandUpNote in dailyStandUpNotes"
                :key="dailyStandUpNote"
            >
                <template v-slot:title>
                    <v-icon>mdi-calendar-range</v-icon> <span class="font-weight-bold ml-2">{{ dailyStandUpNote.title }}</span>
                </template>
                <template v-slot:text>
                    <v-card
                        elevation="2"
                    >
                        <v-card-text v-html="dailyStandUpNote.content">
                        </v-card-text>
                    </v-card>
                    <v-col
                        cols="auto"
                    >
                        <v-btn
                            size="small"
                            @click="deleteItemConfirm(dailyStandUpNote)"
                        >
                            Supprimer
                        </v-btn>
                    </v-col>
                </template>
            </v-expansion-panel>
        </v-expansion-panels>
    </div>
    <ConfirmModal
        v-if="dailyStandUpNoteToDelete !== null"
        v-model="isModalDeleteOpen"
        title="Suppresion d'un élément"
        message="Etes-vous sûr de vouloir supprimer cet élément ?"
        @close-delete-dialog="deleteItemClose()"
        @delete-item="deleteItem()"
    />
</template>