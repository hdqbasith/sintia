<script setup>
import OverlayLayer from "@/components/OverlayLayer.vue";
import { computed } from "vue";
import CardBox from "./CardBox.vue";

const props = defineProps({
  modelValue: {
    type: [String, Number, Boolean],
    default: null,
  },
});
const emit = defineEmits(["update:modelValue", "cancel"]);
const value = computed({
  get: () => props.modelValue,
  set: (value) => emit("update:modelValue", value),
});

const confirmCancel = (mode) => {
  value.value = false;
  emit(mode);
};

const cancel = () => confirmCancel("cancel");

window.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && value.value) {
        cancel();
    }
});
</script>

<template>
    <OverlayLayer v-show="value" @overlay-click="cancel">
    <div
      v-show="value"
      class="shadow-lg max-h-screen w-11/12 md:w-4/5 lg:w-4/5 xl:w-9/12 z-50 overflow-y-scroll aside-scrollbars-gray"
      is-modal
    >
        <slot />
    </div>
    </OverlayLayer>
</template>
