<script setup lang="ts">
const props = defineProps<{
    title: String
    message: String
}>()

const emit = defineEmits(['closeDeleteDialog', 'deleteItem'])

</script>

<template>
    <v-dialog
        max-width="500px"
        persistent
    >
        <v-card>
            <v-card-title
                class="headline"
            >
                {{ title }}
            </v-card-title>
            <v-card-text>
                {{ message }}
            </v-card-text>
            <v-card-actions>
                <v-spacer />
                <v-btn
                    color="grey darken-1"
                    @click="$emit('closeDeleteDialog')"
                >
                    ANNULER
                </v-btn>
                <v-btn
                    color="primary darken-1"
                    @click="$emit('deleteItem')"
                >
                    SUPPRIMER
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>
