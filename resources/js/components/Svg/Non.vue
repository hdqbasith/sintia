<script setup>
import { usePage } from '@inertiajs/vue3';
import { ref, watchEffect } from "vue";

defineProps({
    kode: {
        type: String,
        default: 'sou',
    }
})
</script>
<template>
    <polygon v-if="kode == 'nvt'" points="5,15 15,15 10,25" transform="translate(0,15)" stroke="black" fill="white" />
    <polygon v-if="kode == 'rct'" points="5,15 15,15 10,25" transform="translate(0,15)" stroke="black" fill="black" />
    <text v-if="kode == 'non'" x="1" y="9" fill="black" font-size="6pt" class="font-serif">NON</text>
    <text v-if="kode == 'une'" x="1" y="9" fill="black" font-size="6pt" class="font-serif">UNE</text>
    <text v-if="kode == 'pre'" x="2" y="9" fill="black" font-size="6pt" class="font-serif">PRE</text>
    <text v-if="kode == 'ano'" x="1" y="9" fill="black" font-size="6pt" class="font-serif">ANO</text>
    <polygon v-if="kode == 'car'" points="5,5 15,5 15,15 5,15" stroke="black" stroke-width="2" transform="translate(0,10)"
        fill="none" />
    <text v-if="kode == 'cfr'" x="3.5" y="28" fill="black" font-size="16pt" class="font-sans font-bold">#</text>
    <polygon v-if="kode == 'non'" points="0,0 0,20 20,20 20,0" stroke="black" stroke-width="2" transform="translate(0,10)"
        fill="none" />
    <polyline v-if="kode == 'rrx'" points="3,-3 9,20 17,-5" stroke="black" stroke-width="2" transform="translate(0,10)"
        fill="none" />
    <text v-if="kode == 'mis'" x="-1" y="33" fill="black" font-size="28pt" class="font-sans">X</text>
    <text v-if="kode == 'ipx'" x="3" y="37" fill="black" font-size="6pt" class="font-serif">IPX</text>
    <text v-if="kode == 'prd'" x="2" y="37" fill="black" font-size="6pt" class="font-serif">PRD</text>
    <text v-if="kode == 'fld'" x="2" y="37" fill="black" font-size="6pt" class="font-serif">FLD</text>
    <polygon v-if="kode == 'mig_r'" points="0,10 5,10 5,12 8,10 5,8 5,10" stroke="black" stroke-width=".7"
        transform="translate(6,23)" fill="black" />
    <polygon v-if="kode == 'mig_l'" points="0,10 5,10 5,12 8,10 5,8 5,10" stroke="black" stroke-width=".7"
        transform="translate(14,23) scale(-1,1)" fill="black" />
</template>