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
      class="shadow-lg max-h-screen z-50 overflow-y-auto aside-scrollbars-gray"
      is-modal
    >
        <slot />
    </div>
    </OverlayLayer>
</template>
