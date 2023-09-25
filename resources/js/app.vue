<template>
    
    <div class="container">
        <search-form :model="model" :processing="loading" @search="search" />
    </div>

</template>


<script lang="ts" setup>

import { ref } from 'vue'
import SearchForm, { type SearchModel } from './components/SearchForm/'

const model = ref<SearchModel>({})
const loading = ref(false)

const search = () => {
    loading.value = true;

    setTimeout(function() {
        loading.value = false;
    }, 5000)
}

</script>

<style lang="scss" scoped>

.container {
    max-width: 480px;
    background: #efefef;
    padding: 20px;
    border-radius: 20px;
    margin: 0 auto;
}

</style>