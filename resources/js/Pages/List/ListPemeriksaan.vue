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

const props = defineProps({
  listRecord: Object,
  listCheckup: Object,
  listOdo: Object,
  pasienOdo: Object,
})
const antrean = usePage().props.antrean;
const petak = {
  1: { k: 18, v: 1 }, 2: { k: 17, v: 1 }, 3: { k: 16, v: 1 }, 4: { k: 15, v: 1 }, 5: { k: 14, v: 1 }, 6: { k: 13, v: 2 }, 7: { k: 12, v: 2 }, 8: { k: 11, v: 2 }, 9: { k: 21, v: 2 }, 10: { k: 22, v: 2 }, 11: { k: 23, v: 2 }, 12: { k: 24, v: 1 }, 13: { k: 25, v: 1 }, 14: { k: 26, v: 1 }, 15: { k: 27, v: 1 }, 16: { k: 28, v: 1 }, 17: { k: 55, v: 1 }, 18: { k: 54, v: 1 }, 19: { k: 53, v: 2 }, 20: { k: 52, v: 2 }, 21: { k: 51, v: 2 }, 22: { k: 61, v: 2 }, 23: { k: 62, v: 2 }, 24: { k: 63, v: 2 }, 25: { k: 64, v: 1 }, 26: { k: 65, v: 1 }, 27: { k: 85, v: 1 }, 28: { k: 84, v: 1 }, 29: { k: 83, v: 2 }, 30: { k: 82, v: 2 }, 31: { k: 81, v: 2 }, 32: { k: 71, v: 2 }, 33: { k: 72, v: 2 }, 34: { k: 73, v: 2 }, 35: { k: 74, v: 1 }, 36: { k: 75, v: 1 }, 37: { k: 48, v: 1 }, 38: { k: 47, v: 1 }, 39: { k: 46, v: 1 }, 40: { k: 45, v: 1 }, 41: { k: 44, v: 1 }, 42: { k: 43, v: 1 }, 43: { k: 42, v: 2 }, 44: { k: 41, v: 2 }, 45: { k: 31, v: 2 }, 46: { k: 32, v: 2 }, 47: { k: 33, v: 1 }, 48: { k: 34, v: 1 }, 49: { k: 35, v: 1 }, 50: { k: 36, v: 1 }, 51: { k: 37, v: 1 }, 52: { k: 38, v: 1 }
};
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
const tooth = useForm({
  number: '',
  left: {
    width: .5,
    fill: '',
  },
  top: {
    width: .5,
    fill: '',
  },
  right: {
    width: .5,
    fill: '',
  },
  bottom: {
    width: .5,
    fill: '',
  },
  middle: {
    width: .5,
    fill: '',
  },
  codes: {
    id: '',
    key: ''
  },
  current: '',
});

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
  router.post(route('pemeriksaan.store'), 'data=' + JSON.stringify(groupInput) + '&pasien=' + antrean.pasien, {
    onSuccess: (() => {
      groupInput.splice(0);
    }),
    preserveState: true,
    only: ['listRecord']
  });
}
const showModalOdo = ref(false);
const position = ref('L');
const highlight = ref(false);
const changePosition = (a) => {
  position.value = a;
  highlight.value = true;
  tooth.current = a;
};
const diagnosaGigi = (a) => {
  tooth.codes = a;
}
const passOdo = (i, t) => {
  if (props.pasienOdo[i] != undefined && t == 'p') return { tooth: props.pasienOdo[i] };
  else if (props.pasienOdo[i] != undefined && t == 'c') return props.pasienOdo[i].daftar_odontogram.kode;
}
const saveOdo = () => {
  const form = useForm({
    pasien: antrean.pasien,
    number: tooth.number,
    left: JSON.stringify(tooth.left),
    top: JSON.stringify(tooth.top),
    right: JSON.stringify(tooth.right),
    bottom: JSON.stringify(tooth.bottom),
    middle: JSON.stringify(tooth.middle),
    condition: tooth.codes.id,
  });
  form.post(route('odontogram.store'), {
    onSuccess: () => {
      tooth.reset();
      showModalOdo.value = false;
    }
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
        <div v-show="tabs.tabOdontogram" class="">

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
          <!-- <h3 class="text-2xl font-bold mb-5">Odontogram</h3> -->
          <div class="">
            <div class="grid grid-flow-col justify-center gap-2 text-center">
              <div v-for="i in range(1, 17)" :key="i">
                <span class="block">{{ petak[i].k }}</span>
                <Tooth :h="60" :w="30" :tipe="petak[i].v" v-bind="passOdo(petak[i].k, 'p')"
                  @changePosition="changePosition"
                  @click="{ showModalOdo = petak[i].k; position = position; tooth.number = petak[i].k }">
                  <Non :kode="passOdo(petak[i].k, 'c')" />
                </Tooth>
              </div>
            </div>
            <div class="grid grid-flow-col justify-center gap-2 text-center">
              <div v-for="i in range(17, 27)" :key="i">
                <span class="block">{{ petak[i].k }}</span>
                <Tooth :h="60" :w="30" :tipe="petak[i].v" v-bind="passOdo(petak[i].k, 'p')"
                  @changePosition="changePosition"
                  @click="{ showModalOdo = petak[i].k; position = position; tooth.number = petak[i].k }">
                  <Non :kode="passOdo(petak[i].k, 'c')" />
                </Tooth>
              </div>
            </div>
            <div class="grid grid-flow-col justify-center gap-2 text-center">
              <div v-for="i in range(27, 37)" :key="i">
                <Tooth :h="60" :w="30" :tipe="petak[i].v" v-bind="passOdo(petak[i].k, 'p')"
                  @changePosition="changePosition"
                  @click="{ showModalOdo = petak[i].k; position = position; tooth.number = petak[i].k }">
                  <Non :kode="passOdo(petak[i].k, 'c')" />
                </Tooth>
                <span class="block">{{ petak[i].k }}</span>
              </div>
            </div>
            <div class="grid grid-flow-col justify-center gap-2 text-center">
              <div v-for="i in range(37, 53)" :key="i">
                <Tooth :h="60" :w="30" :tipe="petak[i].v" v-bind="passOdo(petak[i].k, 'p')"
                  @changePosition="changePosition"
                  @click="{ showModalOdo = petak[i].k; position = position; tooth.number = petak[i].k }">
                  <Non :kode="passOdo(petak[i].k, 'c')" />
                </Tooth>
                <span class="block">{{ petak[i].k }}</span>
              </div>
            </div>
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
        <div class="grid grid-cols-3 bg-white">
          <div class="col-span-1">
            <Tooth :h="300" :w="300" v-bind="{ highlight: highlight, tooth: tooth }" @changePosition=changePosition>
              <Non :kode="tooth.codes.key" />
            </Tooth>
          </div>
          <div class="col-span-2 mt-6 picker" @click="highlight = false">
            <div class="grid grid-flow-col">
              <div class="w-12">
                <button class="bg-red-600 w-10 h-10 border-x border-y border-black mt-3"
                  @click="tooth[position].fill = 'red'"></button>
                <button class="bg-black w-10 h-10 border-x border-y border-black mt-3"
                  @click="tooth[position].fill = 'black'"></button>
                <button class="bg-white w-10 h-10 border-x border-y border-black mt-3"
                  @click="tooth[position].fill = 'white'"></button>
                <button class="bg-pink-500 w-10 h-10 border-x border-y border-black mt-3"
                  @click="tooth[position].fill = 'pink'"></button>
                <button class="bg-green-700 w-10 h-10 border-x border-y border-black mt-3"
                  @click="tooth[position].fill = 'green'"></button>
                <svg height="40px" width="40px" viewBox="0 0 8 8" class="inline striped mt-3"
                  @click="tooth[position].fill = 'url(#diagonalHatch)'">
                  <rect height="8" width="8" fill="url(#diagonalHatch)" stroke="black" />
                </svg>
                <button class="w-10 h-10 border-x border-y border-black mt-3"
                  @click="tooth[position].width = .5">tipis</button>
                <button class="w-10 h-10 border-x border-y border-black mt-3 font-bold"
                  @click="tooth[position].width = 2">tebal</button>
              </div>
              <div class="w-96">
                <div class="bg-white text-center pt-4">Gigi nomor : <span class="text-lg font-bold"> {{ showModalOdo }}
                    posisi {{ position
                    }}</span></div>
                <DiagnosaOdo :list-odo="listOdo" @diagnosa-gigi="diagnosaGigi" :selected="tooth.codes.key" />
                <BaseButton label="Simpan" color="info" @click="saveOdo" class="float-right me-10" />
              </div>
            </div>
          </div>
        </div>
      </CardBoxModalEmpty>
    </SectionMain>
  </LayoutAuthenticated>
</template>
<style>
.picker button:hover,
svg.striped:hover {
  border-width: 3px;
  border-color: aqua;
  cursor: pointer;
}

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

/* svg.tooth g polygon {
  stroke-width: 0.5;
} */

polygon {
  stroke-linejoin: round;
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
}</style>