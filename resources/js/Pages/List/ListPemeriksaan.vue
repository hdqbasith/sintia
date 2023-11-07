<script setup>
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SectionMain from "@/components/SectionMain.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import { Head, router, usePage } from "@inertiajs/vue3";
import { mdiAccountHeart, mdiHumanQueue, mdiPlusThick, mdiPrinter } from "@mdi/js";
import CardBox from '@/components/CardBox.vue';
import { reactive, ref, } from "vue";
import BaseButton from "@/components/BaseButton.vue";
import FormDiagnosis from "../Form/FormDiagnosis.vue";
import FormCheckup from "../Form/FormCheckup.vue";
import FormOdontogram from "../Form/FormOdontogram.vue";

const props = defineProps({
  pasienCheckup: Object,
  listCheckup: Object,
  pasienOdo: Object,
  pasienCheckupExtra: Object,
})
const antrean = usePage().props.antrean?? null;
const tabs = reactive({
  tabOdontogram: true,
  tabPemeriksaan: false,
  tabDiagnosa: false,
});
const tabAktif = (i) => {
  Object.keys(tabs).forEach(t => {
    tabs[t] = false;
  });
  tabs[i] = true;
}

const groupInput = reactive([]);
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <Head title="Pemeriksaan Pasien" />
      <SectionTitleLineWithButton :icon="mdiAccountHeart" title="Pemeriksaan Pasien">
        <div class="text-right">
          <BaseButton :icon="mdiHumanQueue" label="Daftar Antrean" color="success" rounded-full small
            @click="router.visit('/antrean/list')" class="me-2 mb-2" />
          <BaseButton :icon="mdiPlusThick" label="Daftar Pasien" color="info" rounded-full small
            @click="router.visit('/pasien/list')" />
        </div>
      </SectionTitleLineWithButton>
      <CardBox>
        <div class="mb-3">
          <BaseButton class="float-right" label="Cetak" color="info" :icon="mdiPrinter" href="cetak" target="_blank" />
          <BaseButton class="float-right" label="Surat Keterangan" color="info" :icon="mdiPrinter" href="cetak_suket" target="_blank" />
          <BaseButton v-for="(t, i) in tabs" :label="i.toString().replace('tab', '')" :key="i" class="me-1 mb-3"
            :class="tabs[i] ? '' : 'text-xs'" @click="tabAktif(i)" :color="tabs[i] ? 'success' : 'info'" />
        </div>
        <FormOdontogram v-show="tabs.tabOdontogram" :pasien-odo="props.pasienOdo" :pasienCheckupExtra="props.pasienCheckupExtra">
        </FormOdontogram>
        <FormCheckup v-show="tabs.tabPemeriksaan" />
        <FormDiagnosis v-show="tabs.tabDiagnosa" :pasien="antrean?.pasien"/>
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>