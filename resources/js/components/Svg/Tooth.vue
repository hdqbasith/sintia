<script setup>
import { reactive, ref } from "vue";
const props = defineProps({
    h: {
        type: Number,
        default: 50
    },
    w: {
        type: Number,
        default: 50
    },
    highlight: {
        type: Boolean,
        default: false
    },
    tooth: {
        type: Object,
        default: () => ({
            number: '',
            left: {
                width: .5,
                fill: 'white',
            },
            top: {
                width: .5,
                fill: 'white',
            },
            right: {
                width: .5,
                fill: 'white',
            },
            bottom: {
                width: .5,
                fill: 'white',
            },
            middle: {
                width: .5,
                fill: 'white',
            },
            codes: {
                id:'',
                key:''
            },
            current: '',
        })
    },
    tipe: {
        type: Number,
        default: 1
    }
});
const emit = defineEmits(['changePosition']);
const types = {
    1: {
        left: "0,0 5,5 5,15 0,20",
        top: "0,0 20,0 15,5 5,5",
        right: "15,5 20,0 20,20 15,15",
        bottom: "5,15 15,15 20,20 0,20",
        middle: "5,5 15,5 15,15 5,15"
    },
    2: {
        left: "0,0 5,10 5,10 0,20",
        top: "0,0 20,0 15,10 5,10",
        bottom: "5,10 15,10 20,20 0,20",
        right: "15,10 20,0 20,20 15,10",
    }
}
const clickedSide = ref({ position: '', value: '' });

</script>
<template>
    <svg class="tooth inline" viewBox="0 0 20 40" :height="h + 'px'" :width="w + 'px'">
        <pattern id="diagonalHatch" patternUnits="userSpaceOnUse" width="1" height="2">
            <rect fill="white" height="2" width="1" />
            <path d="M 1,-1 l 0,3" stroke="#000000" stroke-width="1" />
        </pattern>
        <!-- fill pattern -->
        <g transform="translate(0,10)" stroke="black">
            <polygon v-for="(p, i) in types[tipe]" :key="i" :points="p" :fill="tooth[i].fill ? tooth[i].fill : 'white'"
                :stroke-width="tooth[i].width"
                @click="{ clickedSide.value = p; clickedSide.position = i; emit('changePosition', i) }" />
        </g>
        <polygon :points="highlight && tooth.current == clickedSide.position ? clickedSide.value : ''" stroke="yellow"
            transform="translate(0,10)" fill="none" />
        <slot />
    </svg>
</template>
<style>

polygon:hover {
  width: 150%;
  height: 150%;
  stroke: aqua;
  fill: aqua;
}
</style>