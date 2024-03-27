import { computed } from 'vue'

const defaultInputClasses =
    'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'
const errorInputClasses =
    'bg-red-50 border border-red-300 text-red-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5'

const defaultLabelClasses = 'block mb-2 text-sm font-medium text-gray-900'
const errorLabelClasses = 'block mb-2 text-sm font-medium text-red-700'

export function useInputClasses(hasError: any) {
    const inputClasses = computed(() => {
        return hasError.value ? errorInputClasses : defaultInputClasses
    })

    const labelClasses = computed(() => {
        return hasError.value ? errorLabelClasses : defaultLabelClasses
    })

    return { inputClasses, labelClasses }
}
