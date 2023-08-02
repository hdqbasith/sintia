<script setup>
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SectionMain from "@/components/SectionMain.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import { Head, usePage } from "@inertiajs/vue3";
import { mdiHomeCity } from "@mdi/js";
import CardBox from '@/components/CardBox.vue';
import CardBoxModal from '@/components/CardBoxModal.vue';
import { computed, onMounted, reactive, ref } from "vue";
import BaseButton from "@/components/BaseButton.vue";
import { replace, toArray, toLower } from "lodash";
import draggable from 'vuedraggable';
import FormSideMenu from "../Form/FormSideMenu.vue";

const menus = toArray(usePage().props.sideMenus);
const menuFiltered = ref();
const filterMenu = (a) => {
  menuFiltered.value = menus.filter((m) => m.level.includes(a));
};
const menuSelected=ref();
const tabs = reactive({
  tabAdmin: true,
  tabDokter: false,
  tabPerawat: false,
  tabKasir: false,
  tabPasien: false,
});
const tabAktif = (i) => {
  Object.keys(tabs).forEach(t => {
    tabs[t] = false;
  });
  tabs[i] = true;
  filterMenu(toLower(replace(i, 'tab', '')));
}
onMounted(() =>
  tabAktif('tabAdmin')
)
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>

      <Head title="Config Menu" />
      <SectionTitleLineWithButton :icon="mdiHomeCity" title="Config Menu" main>
      </SectionTitleLineWithButton>
      <CardBox>
        <div class="mb-3">
          <BaseButton v-for="(t, i) in tabs" :label="i.toString().replace('tab', '')" :key="i" class="me-1 mb-3"
            :class="tabs[i] ? '' : 'text-xs'" @click="tabAktif(i)" :color="tabs[i] ? 'success' : 'info'" />
        </div>
        <draggable v-model="menuFiltered" group="people" @start="drag = true" @end="drag = false" item-key="id">
          <template #item="{ element }">
            <div>{{ element.name }}</div>
          </template>
        </draggable>
      </CardBox>
      <CardBoxModal>
        <FormSideMenu :menu="menuSelected"/>
      </CardBoxModal>
    </SectionMain>
  </LayoutAuthenticated>
</template>
