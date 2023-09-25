<template>
    <div class="search-result">
        <div class="search-result__title">Search Result</div>

        <el-table :data="items" empty-text="List is empty" class="search-result__body">
            <el-table-column prop="name" label="Name" width="180" sortable />
            <el-table-column prop="bedrooms_count" label="Bedrooms" width="180" sortable />
            <el-table-column prop="bathroom_count" label="Bathrooms" width="180" sortable />
            <el-table-column prop="storey_count" label="Storeys" width="180" sortable />
            <el-table-column prop="garage_count" label="Garages" width="180" sortable />
            <el-table-column prop="price" label="Price" width="180" sortable  />
        </el-table>
    </div>
</template>

<script lang="ts" setup>

import { EstateModel } from './types'

const props = defineProps<{
    items: EstateModel[]
}>()

</script>

<style lang="scss" scoped>

.search-result {

    &__title {
        font-size: 18px;
        font-weight: bold;
        margin: 0 0 10px;
    }

    &__body {

    }
}

</style>