import axios from 'axios'
import { toast } from 'vue3-toastify'
import router from '@/router'

const instance = axios.create({
    baseURL: APP_URL_API
})

instance.interceptors.response.use(
    (response) => {
        return response
    },
    (error) => {
        if (error.response) {
            if (isFormError(error)) {
                return Promise.reject(error.response.data.errors.form)
            } else {
                toast.error(error.response.data.message)

                switch (error.response.status) {
                    case 404:
                        setTimeout(() => router.push({ name: 'tableau-de-bord' }), 2000)
                        return Promise.reject(error)
                    case 500:
                        return Promise.reject(error)
                    case 400:
                        return Promise.reject(error)
                    case 401:
                        setTimeout(() => {
                            router.push({ name: 'connexion' })
                        }, 2000)

                        return Promise.reject(error)
                }
            }
        } else if (error.request) {
            toast.error('An error has occurred')
        } else {
            toast.error('An error has occurred')
        }

        return Promise.reject(error)
    }
)

const isFormError = (error: any) => {
    return (
        error.response &&
        error.response.status === 400 &&
        error.response.data &&
        error.response.data.errors &&
        error.response.data.errors.form !== undefined
    )
}

export default instance
