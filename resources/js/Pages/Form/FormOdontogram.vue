<script setup>
import SectionMain from "@/components/SectionMain.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";


</script>

<template>
  <LayoutAuthenticated>
    <RouterView />
  </LayoutAuthenticated>
</template>
