<script setup lang="ts">
const props = defineProps<{
    disabledSubmitButton: Boolean,
}>()
</script>

<template>
    <div>
        <v-col
            cols="12"
            xs="12"
            md="3"
            offset="0"
            offset-md="9"
        >
            <v-btn
                :disabled="disabledSubmitButton"
                class="mt-12"
                color="primary"
                size="large"
                type="submit"
                variant="elevated"
                block
            >
                Valider
            </v-btn>
        </v-col>
    </div>
    </template>
