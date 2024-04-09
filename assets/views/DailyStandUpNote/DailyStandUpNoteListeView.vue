<script setup lang="ts">
import { ref } from 'vue'
import { type Errors } from '@/model/errors'
import FormSectionTitleComponent from '@/components/form/FormSectionTitleComponent.vue'
const errors = ref<Errors>({})

const items = ref(Array.from({ length: 15 }, (k, v) => v + 1))

async function api () {
    return new Promise(resolve => {
        setTimeout(() => {
            resolve(Array.from({ length: 15 }, (k, v) => v + items.value.at(-1) + 1))
        }, 1000)
    })
}
async function load ({ done }) {
    // Perform API call
    const res = await api()

    items.value.push(...res)

    done('ok')
}
</script>
<template >
    <FormSectionTitleComponent title="Liste des daily's stand up" />

    <v-infinite-scroll :style="{ height: '100%' }" :items="items" :onLoad="load">
        <template v-for="(item, index) in items" :key="item">
            <div :class="['pa-2', index % 2 === 0 ? 'bg-grey-lighten-2' : '']">
                <v-dialog max-width="500">
                    <template v-slot:activator="{ props: activatorProps }">
                        <v-btn
                            v-bind="activatorProps"
                            color="surface-variant"
                            text="Dimanche 23 Mai 2021"
                            variant="flat"
                        ></v-btn>
                    </template>

                    <template v-slot:default="{ isActive }">
                        <v-card title="Dimanche 23 Mai 2021">
                            <v-card-text>
                                {{ item }}
                            </v-card-text>

                            <v-card-actions>
                                <v-spacer></v-spacer>

                                <v-btn
                                    text="Fermer"
                                    @click="isActive.value = false"
                                ></v-btn>
                            </v-card-actions>
                        </v-card>
                    </template>
                </v-dialog>
            </div>
        </template>
    </v-infinite-scroll>

</template>
