import { createFetch } from '@vueuse/core'

export const useApiFetch = createFetch({
    baseUrl: '/api',

    options: {
      async beforeFetch({ options }) {
        // const myToken = await getMyToken()
        // options.headers.Authorization = `Bearer ${myToken}`
  
        // return { options }
      },
    },

    fetchOptions: {
      mode: 'cors',
    },
})

export const useApiFilterSetup = () => useApiFetch('filter-setup').get().json()