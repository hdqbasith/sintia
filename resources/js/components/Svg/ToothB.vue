<script setup>
import { reactive, ref } from "vue";
defineProps({
    h:{
        type:Number,
        default:50
    },
    w:{
        type:Number,
        default:50
    },
    highlight:{
        type:Boolean,
        default:false
    }
})
const tooth = reactive({
  number: '',
  left: '',
  top: '',
  right: '',
  bottom: '',
  middle: '',
  code: '',
  gambar: '',
  arti: '',
  catatan: ''
});
const clickedSide = ref();
</script>
<template>
    <svg class="tooth inline" viewBox="0 0 20 40" :height="h+'px'" :width="w+'px'">
        <pattern id="diagonalHatch" patternUnits="userSpaceOnUse" width="1" height="2">
            <rect fill="white" height="2" width="1" />
            <path d="M 1,-1 l 0,3" stroke="#000000" stroke-width="1" />
        </pattern>
        <!-- fill pattern -->
        <g transform="translate(0,10)" stroke="black">
                <polygon points="" @click="clicked('top')" />
                <polygon points="" />
                <polygon points="" />
                <polygon points="" />
            <polygon points="0,0 5,10 5,10 0,20" :fill="tooth.left" @click="clickedSide = '0,0 5,10 5,10 0,20'" />
            <polygon points="0,0 20,0 15,10 5,10" :fill="tooth.top" @click="clickedSide = '0,0 20,0 15,10 5,10'" />
            <polygon points="15,10 20,0 20,20 15,10" :fill="tooth.bottom" @click="clickedSide = '15,10 20,0 20,20 15,10'" />
            <polygon points="5,10 15,10 20,20 0,20" :fill="tooth.right" @click="clickedSide = '5,10 15,10 20,20 0,20'" />
        </g>
        <polygon :points="highlight? clickedSide:''" stroke="aqua" transform="translate(0,10)" fill="none" />
        <slot />
    </svg>
</template>