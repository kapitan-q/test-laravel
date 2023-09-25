<template>
    
    <div class="search-form">
        <search-form :model="filter" :processing="loading" @search="search()" />
    </div>

    <div class="search-result" v-if="!loading && items">
        <estate-list :items="items"></estate-list>
    </div>
</template>


<script lang="ts" setup>

import { ref } from 'vue'
import SearchForm, { type SearchModel } from './components/SearchForm/'
import EstateList, { type EstateModel } from './components/EstateList/'
import { useApiFetch } from './composables/api.ts'

const filter  = ref<SearchModel>({})
const loading = ref(false)
const items   = ref<EstateModel[]>()

const search = async () => {
    loading.value = true

    const { data } = await useApiFetch('data').post(filter.value).json()

    items.value = data.value
    loading.value = false
}

</script>

<style lang="scss" scoped>

.search-form {
    max-width: 480px;
    background: #efefef;
    padding: 20px;
    border-radius: 20px;
    margin: 0 auto;
}

.search-result {
    max-width: 1920px;
    margin: 50px auto 0;
    padding: 0 20px;
}

</style>