<script setup>
import { containerMaxW } from "@/config.js";
import BaseLevel from "@/components/BaseLevel.vue";
import JustboilLogo from "@/components/JustboilLogo.vue";

const year = new Date().getFullYear();
</script>

<template>
  <footer class="py-2 px-6" :class="containerMaxW">
    <BaseLevel>
      <div class="text-center md:text-left">
        <b
          >&copy;{{ year }},
          <a href="https://nidhoma.gusjigang.id/" target="_blank">Nidhoma</a>.</b
        >
        <slot />
      </div>
      <div class="md:py-2">
        <a href="https://Nidhoma.gusjigang.id">
          <JustboilLogo class="w-auto h-10 md:h-10" />
        </a>
      </div>
    </BaseLevel>
  </footer>
</template>
