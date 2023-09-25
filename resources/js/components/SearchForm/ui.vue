<template>
    <div class="search-form">
        <div class="search-form__title">Estatesearch</div>

        <el-form ref="form" label-width="120px" class="search-form__body">
            <el-form-item label="Object name">
                <el-input v-model="model.name" :disabled="processing" />
            </el-form-item>

            <el-form-item label="Bathrooms">
                <el-input-number v-model="model.bathrooms" :disabled="processing" />
            </el-form-item>

            <el-form-item label="Storeys">
                <el-input-number v-model="model.storeys" :disabled="processing" />
            </el-form-item>

            <el-form-item label="Garages">
                <el-input-number v-model="model.garages" :disabled="processing" />
            </el-form-item>

            <el-form-item label="Object price" v-if="!isSettingFetching">
                <el-slider v-model="model.price" range :disabled="processing" :min="settings?.priceRange?.min" :max="settings?.priceRange?.max" />
            </el-form-item>
        </el-form>

        <div class="search-form__actions">
            <el-button @click="emit('search', model)" :loading="processing">Search</el-button>            
        </div>
    </div>
</template>


<script lang="ts" setup>

import { ref, onMounted } from 'vue'
import { Model } from './types'
import { useApiFilterSetup } from '../../composables/api'

const props = withDefaults(defineProps<{
    model: Model,
    processing: Boolean
}>(), {
    processing: false
})

const emit  = defineEmits(['search'])

const { data:settings, isFetching:isSettingFetching } = useApiFilterSetup()

</script>

<style lang="scss" scoped>

.search-form {
    // max-width: 480px;
    // background: #efefef;
    // padding: 20px;
    // border-radius: 20px;
    // margin: 0 auto;

    &__title {
        font-size: 18px;
        font-weight: bold;
        margin: 0 0 10px;
    }

    &__body {

    }

    &__actions {
        text-align: center;
    }
}

</style>