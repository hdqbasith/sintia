<script setup>
defineProps({
    show: Boolean,
})
</script>
<template>
    <div v-if="show" class="grid grid-flow-col">
        <slot/>
    </div>
    <slot v-else />
</template>