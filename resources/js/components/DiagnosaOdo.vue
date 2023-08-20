<script setup>
import { InputGroup, RichSelect } from '@flavorly/vanilla-components';
import Non from './Svg/Non.vue';
import { ref } from "vue";
defineProps({
    listOdo: {
        type:Object,
        default: () => ({})
    },
    selected: String,
})
const emit=defineEmits(['diagnosaGigi']);
const selected = ref('');
</script>
<template>
    <InputGroup label="Diagnosa Gigi" >
    <RichSelect :options="listOdo" v-model="selected">
        <template #option="{ option: { raw: a }, isSelected }">
            <div @click="emit('diagnosaGigi',{id:a.value,key:a.kode})" class="cursor-pointer hover:border-orange-500 hover:border-2 mb-3" :selected="isSelected">
                <svg viewBox="0 0 20 40" width="50" height="50" class="inline-block">
                    <Non :kode="a.kode"></Non>
                </svg>
                <span class="ms-2">{{ a.text }}</span>
            </div>
        </template>
    </RichSelect>
    </InputGroup>
</template>