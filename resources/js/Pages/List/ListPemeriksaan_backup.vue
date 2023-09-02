<script setup>
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SectionMain from "@/components/SectionMain.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import { Head, router, useForm, usePage } from "@inertiajs/vue3";
import { mdiAccountHeart, mdiAccountMultiplePlus, mdiArrowRightBold, mdiArrowRightBoldBox, mdiArrowRightBox, mdiCancel, mdiClose, mdiCloseCircle, mdiCloseThick, mdiContentSave, mdiCross, mdiEye, mdiHumanQueue, mdiMenuDown, mdiMenuUp, mdiPencil, mdiPlusThick } from "@mdi/js";
import CardBox from '@/components/CardBox.vue';
import { reactive, ref, computed, } from "vue";
import BaseButton from "@/components/BaseButton.vue";
import { InputGroup, VanillaInput } from "@flavorly/vanilla-components";
import FormPasien from "../Form/FormPasien.vue";
import CardBoxModalEmpty from "@/components/CardBoxModalEmpty.vue";
import { range, split, toArray, toLower } from "lodash";
import BaseIcon from "@/components/BaseIcon.vue";
import FormAntrean from "../Form/FormAntrean.vue";
import BaseLevel from "@/components/BaseLevel.vue";
import BaseButtons from "@/components/BaseButtons.vue";
import mapSort from "mapsort";
import Tooth from "@/components/Svg/Tooth.vue";
import ToothB from "@/components/Svg/ToothB.vue";
import Non from "@/components/Svg/Non.vue";
import DiagnosaOdo from "@/components/DiagnosaOdo.vue";
import FormDiagnosis from "../Form/FormDiagnosis.vue";
import FormCheckup from "../Form/FormCheckup.vue";
import FormOdontogram from "../Form/FormOdontogram.vue";

const props = defineProps({
  pasienCheckup: Object,
  listCheckup: Object,
})
const antrean = usePage().props.antrean?? null;
const tabs = reactive({
  tabOdontogram: true,
  tabPemeriksaan: false,
  tabPemeriksaan2: false,
  tabDiagnosa: false,
});
const tabAktif = (i) => {
  Object.keys(tabs).forEach(t => {
    tabs[t] = false;
  });
  tabs[i] = true;
}
const col = {
  nomor_rm: 'No. RM',
  nama: 'Nama',
  tempat_lahir: 'Tempat Lahir',
  tanggal_lahir: 'Tanggal Lahir',
  nik: 'NIK',
  bpjs: 'No. BPJS',
  gender: 'L/P',
  pekerjaan: 'Pekerjaan',
  alamat: 'Alamat',
  hp: 'No. HP',
  goldar: 'Gol Darah',
};

const searchInput = ref();
const groupInput = reactive([]);
const addInput = (name) => {
  const a = ref(true);
  groupInput.forEach(g => {
    if (g.key == name) a.value = false;
  });
  if (a.value) groupInput.push({ key: name, val: '' });
}
const submit = () => {
  router.post(route('pemeriksaan.store_checkup'), 'data=' + JSON.stringify(groupInput) + '&pasien=' + antrean.pasien, {
    onSuccess: (() => {
      groupInput.splice(0);
    }),
    preserveState: true,
    only: ['pasienCheckup']
  });
}
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
          <BaseButton v-for="(t, i) in tabs" :label="i.toString().replace('tab', '')" :key="i" class="me-1 mb-3"
            :class="tabs[i] ? '' : 'text-xs'" @click="tabAktif(i)" :color="tabs[i] ? 'success' : 'info'" />
        </div>
        <FormOdontogram v-show="tabs.tabOdontogram">
        </FormOdontogram>
        <!-- <div v-show="tabs.tabPemeriksaan">
          <BaseButton label="Simpan" color="info" class="float-right" :icon="mdiContentSave" icon-size="45px"
            @click="submit" />
          <div class="grid grid-cols-4">
            <div class="col-span-1">
              <VanillaInput v-model="searchInput" placeholder="Bagian yang diperiksa" />
              <BaseButtons class=" h-96 overflow-y-scroll aside-scrollbars-gray">
                <BaseButton v-for="(c, i) in listCheckup" :label="c.target" class="w-full" @click="addInput(i)" />
              </BaseButtons>
            </div>
            <div class="col-span-3">
              <div v-for="(r, i) in pasienCheckup" class="grid grid-cols-3 border-b-2 pb-2 mt-3">
                <div class="col-span-1 ms-5">
                  <BaseButton :icon="mdiCloseThick" class="me-2" color="danger" title="Hapus"
                    @click="$inertia.post(route('pemeriksaan.delete'), 'id=' + r.id, { only: ['pasienCheckup'], preserveScroll: true })" />
                  <span>{{ listCheckup[r.kode].target }}</span>
                </div>
                <div class="col-span-2">
                  <span v-html="': ' + r.keterangan + ' ' + listCheckup[r.kode].satuan" />
                </div>
              </div>
              <InputGroup v-for="(v, i) in groupInput" :label="listCheckup[v.key].target" :name="v.key" variant="inline">
                <VanillaInput v-model="v.val" placeholder="Hasil Pemeriksaan" :name="v.key">
                  <template #after>
                    <span class="text-black me-2" v-html="listCheckup[v.key].satuan"></span>
                    <BaseButton :icon="mdiCloseThick" color="danger" rounded-full @click="groupInput.splice(i, 1)" />
                  </template>
                </VanillaInput>
              </InputGroup>
            </div>

          </div>
        </div> -->
        <FormCheckup v-show="tabs.tabPemeriksaan2" />
        <FormDiagnosis v-show="tabs.tabDiagnosa" :pasien="antrean?.pasien"/>
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>