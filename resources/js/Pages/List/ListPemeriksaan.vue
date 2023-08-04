<script setup>
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SectionMain from "@/components/SectionMain.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import { Head, router, useForm, usePage } from "@inertiajs/vue3";
import { mdiAccountHeart, mdiAccountMultiplePlus, mdiArrowRightBold, mdiArrowRightBoldBox, mdiArrowRightBox, mdiCancel, mdiClose, mdiCloseCircle, mdiCloseThick, mdiContentSave, mdiCross, mdiEye, mdiHumanQueue, mdiMenuDown, mdiMenuUp, mdiPencil, mdiPlusThick } from "@mdi/js";
import CardBox from '@/components/CardBox.vue';
import { reactive, ref, computed } from "vue";
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

defineProps({
  listRecord: Object,
  listCheckup: Object,
})
const antrean = usePage().props.antrean;
const tabs = reactive({
  tabOdontogram: true,
  tabPemeriksaan: false,
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
const clicked = (a) => {
  alert(a);
}

const searchInput = ref();
const groupInput = reactive([]);
const addInput = (name) => {
  const a=ref(true);
  groupInput.forEach(g => {
    if (g.key == name) a.value=false;
  });
  if(a.value) groupInput.push({ key: name, val: '' });
}
const submit = () => {
  router.post(route('pemeriksaan.store'), 'data=' + JSON.stringify(groupInput) + '&pasien=' + antrean.pasien, {
    onSuccess: (() => {
      groupInput.splice(0);
    }),
    preserveState: true,
    only: ['listRecord']
  });
}
const showModalOdo=ref(false);
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
        <div v-show="tabs.tabOdontogram">

          <!-- <div class="col-span-2">
            <h2 class="text-2xl font-bold mb-3">Detail Pasien</h2>
            <div class="grid grid-cols-3 items-start gap-4 content-center border-b-slate-500 border-b-2 mb-2"
              v-for="(c, i) in col">
              <div class="flex justify-start items-center font-bold">
                {{ c }}
              </div>
              <div class="col-span-2 mt-0 flex flex-col">
                : {{ antrean?.daftar_pasien[i] }}
              </div>
            </div>
          </div> -->
          <h3 class="text-2xl font-bold mb-5">Odontogram</h3>
          <div class="text-center">
            <svg class="tooth inline" viewBox="0 0 20 35" height="55px" width="55px" v-for="i in range(18, 13)"  @click="showModalOdo=true">
              <g transform={translate}>
                <polygon points="0,0 20,0 15,5 5,5" @click="clicked('top')" />
                <polygon points="5,15 15,15 20,20 0,20" />
                <polygon points="15,5 20,0 20,20 15,15" />
                <polygon points="0,0 5,5 5,15 0,20" />
                <polygon points="5,5 15,5 15,15 5,15" />
              </g>
              <text x="0" y="35" font-family="Verdana" font-size="13" fill="blue">{{ i }}</text>
            </svg>
            <svg class="tooth inline" viewBox="0 0 20 35" height="55px" width="55px" v-for="i in range(13, 10)">
              <g transform={translate}>
                <polygon points="0,0 20,0 15,10 5,10" @click="clicked('top')" />
                <polygon points="5,10 15,10 20,20 0,20" />
                <polygon points="15,10 20,0 20,20 15,10" />
                <polygon points="0,0 5,10 5,10 0,20" />
              </g>
              <text x="0" y="35" font-family="Verdana" font-size="13" fill="blue">{{ i }}</text>
            </svg>
            <svg class="tooth inline" viewBox="0 0 20 35" height="55px" width="55px" v-for="i in range(21, 24)">
              <g transform={translate}>
                <polygon points="0,0 20,0 15,10 5,10" @click="clicked('top')" />
                <polygon points="5,10 15,10 20,20 0,20" />
                <polygon points="15,10 20,0 20,20 15,10" />
                <polygon points="0,0 5,10 5,10 0,20" />
              </g>
              <text x="0" y="35" font-family="Verdana" font-size="13" fill="blue">{{ i }}</text>
            </svg>
            <svg class="tooth inline" viewBox="0 0 20 35" height="55px" width="55px" v-for="i in range(24, 29)">
              <g transform={translate}>
                <polygon points="0,0 20,0 15,5 5,5" @click="clicked('top')" />
                <polygon points="5,15 15,15 20,20 0,20" />
                <polygon points="15,5 20,0 20,20 15,15" />
                <polygon points="0,0 5,5 5,15 0,20" />
                <polygon points="5,5 15,5 15,15 5,15" />
              </g>
              <text x="0" y="35" font-family="Verdana" font-size="13" fill="blue">{{ i }}</text>
            </svg>
          </div>
          <div class="text-center mt-3">
            <svg class="tooth inline" viewBox="0 0 20 35" height="55px" width="55px" v-for="i in range(55, 53)">
              <g transform={translate}>
                <polygon points="0,0 20,0 15,5 5,5" @click="clicked('top')" />
                <polygon points="5,15 15,15 20,20 0,20" />
                <polygon points="15,5 20,0 20,20 15,15" />
                <polygon points="0,0 5,5 5,15 0,20" />
                <polygon points="5,5 15,5 15,15 5,15" />
              </g>
              <text x="0" y="35" font-family="Verdana" font-size="13" fill="blue">{{ i }}</text>
            </svg>
            <svg class="tooth inline" viewBox="0 0 20 35" height="55px" width="55px" v-for="i in range(53, 50)">
              <g transform={translate}>
                <polygon points="0,0 20,0 15,10 5,10" @click="clicked('top')" />
                <polygon points="5,10 15,10 20,20 0,20" />
                <polygon points="15,10 20,0 20,20 15,10" />
                <polygon points="0,0 5,10 5,10 0,20" />
              </g>
              <text x="0" y="35" font-family="Verdana" font-size="13" fill="blue">{{ i }}</text>
            </svg>
            <svg class="tooth inline" viewBox="0 0 20 35" height="55px" width="55px" v-for="i in range(61, 64)">
              <g transform={translate}>
                <polygon points="0,0 20,0 15,10 5,10" @click="clicked('top')" />
                <polygon points="5,10 15,10 20,20 0,20" />
                <polygon points="15,10 20,0 20,20 15,10" />
                <polygon points="0,0 5,10 5,10 0,20" />
              </g>
              <text x="0" y="35" font-family="Verdana" font-size="13" fill="blue">{{ i }}</text>
            </svg>
            <svg class="tooth inline" viewBox="0 0 20 35" height="55px" width="55px" v-for="i in range(64, 66)">
              <g transform={translate}>
                <polygon points="0,0 20,0 15,5 5,5" @click="clicked('top')" />
                <polygon points="5,15 15,15 20,20 0,20" />
                <polygon points="15,5 20,0 20,20 15,15" />
                <polygon points="0,0 5,5 5,15 0,20" />
                <polygon points="5,5 15,5 15,15 5,15" />
              </g>
              <text x="0" y="35" font-family="Verdana" font-size="13" fill="blue">{{ i }}</text>
            </svg>
          </div>
          <div class="text-center mt-3">
            <svg class="tooth inline" viewBox="0 0 20 35" height="55px" width="55px" v-for="i in range(85, 83)">
              <g transform={translate}>
                <polygon points="0,0 20,0 15,5 5,5" @click="clicked('top')" />
                <polygon points="5,15 15,15 20,20 0,20" />
                <polygon points="15,5 20,0 20,20 15,15" />
                <polygon points="0,0 5,5 5,15 0,20" />
                <polygon points="5,5 15,5 15,15 5,15" />
              </g>
              <text x="0" y="35" font-family="Verdana" font-size="13" fill="blue">{{ i }}</text>
            </svg>
            <svg class="tooth inline" viewBox="0 0 20 35" height="55px" width="55px" v-for="i in range(83, 80)">
              <g transform={translate}>
                <polygon points="0,0 20,0 15,10 5,10" @click="clicked('top')" />
                <polygon points="5,10 15,10 20,20 0,20" />
                <polygon points="15,10 20,0 20,20 15,10" />
                <polygon points="0,0 5,10 5,10 0,20" />
              </g>
              <text x="0" y="35" font-family="Verdana" font-size="13" fill="blue">{{ i }}</text>
            </svg>
            <svg class="tooth inline" viewBox="0 0 20 35" height="55px" width="55px" v-for="i in range(71, 74)">
              <g transform={translate}>
                <polygon points="0,0 20,0 15,10 5,10" @click="clicked('top')" />
                <polygon points="5,10 15,10 20,20 0,20" />
                <polygon points="15,10 20,0 20,20 15,10" />
                <polygon points="0,0 5,10 5,10 0,20" />
              </g>
              <text x="0" y="35" font-family="Verdana" font-size="13" fill="blue">{{ i }}</text>
            </svg>
            <svg class="tooth inline" viewBox="0 0 20 35" height="55px" width="55px" v-for="i in range(74, 76)">
              <g transform={translate}>
                <polygon points="0,0 20,0 15,5 5,5" @click="clicked('top')" />
                <polygon points="5,15 15,15 20,20 0,20" />
                <polygon points="15,5 20,0 20,20 15,15" />
                <polygon points="0,0 5,5 5,15 0,20" />
                <polygon points="5,5 15,5 15,15 5,15" />
              </g>
              <text x="0" y="35" font-family="Verdana" font-size="13" fill="blue">{{ i }}</text>
            </svg>
          </div>
          <div class="text-center mt-3">
            <svg class="tooth inline" viewBox="0 0 20 35" height="55px" width="55px" v-for="i in range(48, 43)">
              <g transform={translate}>
                <polygon points="0,0 20,0 15,5 5,5" @click="clicked('top')" />
                <polygon points="5,15 15,15 20,20 0,20" />
                <polygon points="15,5 20,0 20,20 15,15" />
                <polygon points="0,0 5,5 5,15 0,20" />
                <polygon points="5,5 15,5 15,15 5,15" />
              </g>
              <g stroke="red">
                <line x1="0" y1="10" x2="20" y2="10" strokeWidth="2"></line>
              </g>
              <text x="0" y="35" font-family="Verdana" font-size="13" fill="blue">{{ i }}</text>
            </svg>
            <svg class="tooth inline" viewBox="0 0 20 35" height="55px" width="55px" v-for="i in range(43, 40)">
              <g transform={translate}>
                <polygon points="0,0 20,0 15,10 5,10" @click="clicked('top')" />
                <polygon points="5,10 15,10 20,20 0,20" />
                <polygon points="15,10 20,0 20,20 15,10" />
                <polygon points="0,0 5,10 5,10 0,20" />
              </g>
              <g stroke="red">
                <line x1="0" y1="0" x2="20" y2="20" strokeWidth="2" />
                <line x1="0" y1="20" x2="20" y2="0" strokeWidth="2" />
              </g>
              <text x="0" y="35" font-family="Verdana" font-size="13" fill="blue">{{ i }}</text>
            </svg>
            <svg class="tooth inline" viewBox="0 0 20 35" height="55px" width="55px" v-for="i in range(31, 34)">
              <g transform={translate}>
                <polygon points="0,0 20,0 15,10 5,10" @click="clicked('top')" fill="gray" />
                <polygon points="5,10 15,10 20,20 0,20" />
                <polygon points="15,10 20,0 20,20 15,10" />
                <polygon points="0,0 5,10 5,10 0,20" />
              </g>
              <g stroke="red">
                <line x1="0" y1="20" x2="20" y2="0" strokeWidth="2" />
              </g>
              <text x="0" y="35" font-family="Verdana" font-size="13" fill="blue">{{ i }}</text>
            </svg>
            <svg class="tooth inline" viewBox="0 0 20 35" height="55px" width="55px" v-for="i in range(34, 39)">
              <g transform={translate}>
                <polygon points="0,0 20,0 15,5 5,5" @click="clicked('top')"
                  style="fill:lime;stroke:purple;stroke-width:1" />
                <polygon points="5,15 15,15 20,20 0,20" />
                <polygon points="15,5 20,0 20,20 15,15" />
                <polygon points="0,0 5,5 5,15 0,20" />
                <polygon points="5,5 15,5 15,15 5,15" />
              </g>
              <text x="0" y="35" font-family="Verdana" font-size="13" fill="blue">{{ i }}</text>
            </svg>
          </div>
        </div>
        <div v-show="tabs.tabPemeriksaan">
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
              <div v-for="(r, i) in listRecord" class="grid grid-cols-3 border-b-2 pb-2 mt-3">
                <div class="col-span-1 ms-5">
                  <BaseButton :icon="mdiCloseThick" class="me-2" color="danger" title="Hapus"
                    @click="$inertia.post(route('pemeriksaan.delete'), 'id=' + r.id, { only: ['listRecord'], preserveScroll: true })" />
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
        </div>
      </CardBox>
      <CardBoxModalEmpty v-model="showModalOdo">
        <svg class="tooth inline" viewBox="0 0 20 35" height="355px" width="355px">
              <g transform={translate}>
                <polygon points="0,0 20,0 15,5 5,5" @click="clicked('top')" />
                <polygon points="5,15 15,15 20,20 0,20" />
                <polygon points="15,5 20,0 20,20 15,15" />
                <polygon points="0,0 5,5 5,15 0,20" />
                <polygon points="5,5 15,5 15,15 5,15" />
              </g>
              <text x="0" y="35" font-family="Verdana" font-size="13" fill="blue">01</text>
            </svg>
      </CardBoxModalEmpty>
    </SectionMain>
  </LayoutAuthenticated>
</template>
<style>
svg.tooth {
  cursor: pointer;
  fill: white;
}

svg.tooth .to-do {
  fill: red;
}

svg.tooth .done {
  fill: blue;
}

svg.tooth .active {
  fill: gray;
}

svg.tooth polygon {
  stroke: black;
  stroke-width: 0.5;
}

polygon:hover {
  fill: lightgray;
  width: 150%;
  height: 150%;
}

rect:hover {
  fill: lightgray;
}

.tooth-wrapper {
  margin: 0 2px;
  position: relative;
}

.flex-container-justify {
  display: flex;
  justify-content: space-around;
}

.flex-container-right {
  display: flex;
  justify-content: flex-end;
}

.flex-container-left {
  display: flex;
  justify-content: flex-start;
}

.tooth {
  font-size: 10pt;
  font-weight: normal;
}
</style>