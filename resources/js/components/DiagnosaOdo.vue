<script setup>
import { InputGroup, RichSelect } from '@flavorly/vanilla-components';
import Non from './Svg/Non.vue';
import { ref } from "vue";
const props=defineProps({
    listOdo: {
        type:Object,
        default: () => ({})
    },
    selected: Number,
})
const emit=defineEmits(['diagnosaGigi']);
const terpilih = ref(props.selected);
const listOdo2=Object.entries(props.listOdo).map((l)=>({
    value:l[1].value,
    kode:l[1].kode,
    text:l[1].text,
}));
</script>
<template>
    <InputGroup label="Diagnosa Gigi" >
    <RichSelect :options="listOdo2" :modelValue="selected">
        <template #option="{ option: { raw: a }, isSelected }">
            <div @click="emit('diagnosaGigi',a.value)" class="cursor-pointer hover:border-orange-500 hover:border-2 mb-3" :selected="isSelected">
                <svg viewBox="0 0 20 40" width="50" height="50" class="inline-block">
                    <Non :kode="a.kode"></Non>
                </svg>
                <span class="ms-2">{{ a.text }}</span>
            </div>
        </template>
    </RichSelect>
    </InputGroup>
</template>