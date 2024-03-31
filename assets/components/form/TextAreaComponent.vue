<script setup lang="ts">
import { useInputClasses } from '@/composables/form/useInputClasses'
import FormErrorComponent from '@/components/form/FormErrorComponent.vue'
import { computed } from 'vue'

const props = defineProps({
    modelValue: String,
    label: String,
    span: {
        type: String,
        default: '4'
    },
    height: {
        type: String,
        default: '100px'
    },
    errors: {
        type: Array,
        default: () => []
    }
})

const hasError = computed(() => props.errors?.length > 0)
const { inputClasses, labelClasses } = useInputClasses(hasError)

const emit = defineEmits(['update:modelValue'])
const onInput = (event: Event) => {
    const target = event.target as HTMLInputElement
    emit('update:modelValue', target.value)
}
</script>

<template>
    <div :class="`col-12 col-md-${span}`">
        <label v-if="label" :class="labelClasses"> {{ label }}</label>
        <textarea
            type="text"
            :value="modelValue"
            @input="onInput"
            :class="inputClasses"
            :style="{ height: height }"
        />
        <FormErrorComponent
            v-if="errors"
            :errors="errors"
        />
    </div>
</template>
