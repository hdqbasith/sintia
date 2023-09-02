<script setup>
import BaseButton from '@/components/BaseButton.vue';
import CardBoxModalEmpty from '@/components/CardBoxModalEmpty.vue';
import DiagnosaOdo from '@/components/DiagnosaOdo.vue';
import Non from '@/components/Svg/Non.vue';
import Tooth from '@/components/Svg/Tooth.vue';
import { VanillaInput, VanillaInputGroup, VanillaSelect } from '@flavorly/vanilla-components';
import { useForm, usePage } from '@inertiajs/vue3';
import { range } from 'lodash';
import { reactive, ref, computed, } from "vue";

const listOdo = usePage().props.listOdo;
const antrean = usePage().props.antrean ?? null;
const props = defineProps({
  pasienOdo: Object,
  pasienCheckupExtra: Object,
});
const toothStatic = (a, b, c, d, e, f, g) => {
  return {
    number: a,
    left: b ?? {
      width: .5,
      fill: '',
    },
    top: c ?? {
      width: .5,
      fill: '',
    },
    right: d ?? {
      width: .5,
      fill: '',
    },
    bottom: e ?? {
      width: .5,
      fill: '',
    },
    middle: f ?? {
      width: .5,
      fill: '',
    },
    condition: g ?? 9
  }
};
const tooth = useForm({
  number: 1,
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
  condition: 9,
  position: ''
});
const petak = {
  1: { k: 18, v: 1 }, 2: { k: 17, v: 1 }, 3: { k: 16, v: 1 }, 4: { k: 15, v: 1 }, 5: { k: 14, v: 1 }, 6: { k: 13, v: 2 }, 7: { k: 12, v: 2 }, 8: { k: 11, v: 2 }, 9: { k: 21, v: 2 }, 10: { k: 22, v: 2 }, 11: { k: 23, v: 2 }, 12: { k: 24, v: 1 }, 13: { k: 25, v: 1 }, 14: { k: 26, v: 1 }, 15: { k: 27, v: 1 }, 16: { k: 28, v: 1 }, 17: { k: 55, v: 1 }, 18: { k: 54, v: 1 }, 19: { k: 53, v: 2 }, 20: { k: 52, v: 2 }, 21: { k: 51, v: 2 }, 22: { k: 61, v: 2 }, 23: { k: 62, v: 2 }, 24: { k: 63, v: 2 }, 25: { k: 64, v: 1 }, 26: { k: 65, v: 1 }, 27: { k: 85, v: 1 }, 28: { k: 84, v: 1 }, 29: { k: 83, v: 2 }, 30: { k: 82, v: 2 }, 31: { k: 81, v: 2 }, 32: { k: 71, v: 2 }, 33: { k: 72, v: 2 }, 34: { k: 73, v: 2 }, 35: { k: 74, v: 1 }, 36: { k: 75, v: 1 }, 37: { k: 48, v: 1 }, 38: { k: 47, v: 1 }, 39: { k: 46, v: 1 }, 40: { k: 45, v: 1 }, 41: { k: 44, v: 1 }, 42: { k: 43, v: 1 }, 43: { k: 42, v: 2 }, 44: { k: 41, v: 2 }, 45: { k: 31, v: 2 }, 46: { k: 32, v: 2 }, 47: { k: 33, v: 1 }, 48: { k: 34, v: 1 }, 49: { k: 35, v: 1 }, 50: { k: 36, v: 1 }, 51: { k: 37, v: 1 }, 52: { k: 38, v: 1 }
};
const teeth = reactive({});
Object.keys(petak).forEach(p => {
  teeth[p] = toothStatic(p);
});
const updateOdo = () => {
  Object.keys(props.pasienOdo).forEach(p => {
    teeth[p] = toothStatic(
      props.pasienOdo[p].number,
      props.pasienOdo[p].left,
      props.pasienOdo[p].top,
      props.pasienOdo[p].right,
      props.pasienOdo[p].bottom,
      props.pasienOdo[p].middle,
      props.pasienOdo[p].condition
    );
  })
};
updateOdo();
const showModalOdo = ref(false);
const position = ref('left');
const highlight = ref(false);
const selectTooth = (i) => {
  showModalOdo.value = i;
  tooth.number = teeth[i].number;
  tooth.left = teeth[i].left;
  tooth.top = teeth[i].top;
  tooth.right = teeth[i].right;
  tooth.bottom = teeth[i].bottom;
  tooth.middle = teeth[i].middle;
  tooth.condition = teeth[i].condition;
  // Object.keys(tooth.data).forEach((t)=>{
  //   if(t!='position') tooth[t]=teeth[i][t];
  // })
};
const changePosition = (a) => {
  position.value = a;
  highlight.value = true;
  tooth.position = a;
};
const diagnosaGigi = (a) => {
  tooth.condition = a;
}
const passOdo = (i, t) => {
  if (t == 'p') {
    return { tipe: petak[i].v };
  }
  else if (props.pasienOdo[petak[i].k] != undefined && t == 'c') return props.pasienOdo[petak[i].k].daftar_odontogram.kode;

  // if (props.pasienOdo[petak[i].k] != undefined && t == 'p') {
  //   tooth.left=props.pasienOdo[petak[i].k].left;
  //   tooth.top=props.pasienOdo[petak[i].k].top;
  //   tooth.right=props.pasienOdo[petak[i].k].right;
  //   tooth.bottom=props.pasienOdo[petak[i].k].bottom;
  //   props.pasienOdo[petak[i].k].middle!=undefined ? tooth.middle=props.pasienOdo[petak[i].k].middle: null;
  //   return { tooth: tooth, tipe: i };
  // }
  // else if (props.pasienOdo[i] != undefined && t == 'c') return props.pasienOdo[i].daftar_odontogram.kode;
  // else tooth.reset;
}
const saveOdo = () => {
  const form = useForm({
    pasien: antrean?.pasien,
    number: tooth.number,
    left: JSON.stringify(tooth.left),
    top: JSON.stringify(tooth.top),
    right: JSON.stringify(tooth.right),
    bottom: JSON.stringify(tooth.bottom),
    middle: JSON.stringify(tooth.middle),
    condition: tooth.condition,
  });
  form.post(route('odontogram.store'), {
    onSuccess: () => {
      tooth.reset();
      showModalOdo.value = false;
      updateOdo();
    }
  });

}

const optionExtra = {
  1: {
    key: 'Occlusi',
    options: ['-', 'Normal Bite', 'Cross Bite', 'Steep Bite']
  },
  2: {
    key: 'Torus Palatinus',
    options: ['-', 'Tidak Ada', 'Kecil', 'Sedang', 'Besar', 'Multiple']
  },
  3: {
    key: 'Torus Mandibularis',
    options: ['-', 'Tidak ada', 'sisi kiri', 'sisi kanan', 'kedua sisi']
  },
  4: {
    key: 'Palatum',
    options: ['-', 'Dalam', 'Sedang', 'Rendah']
  },
  5: {
    key: 'Diastema',
    options: ['-', 'Tidak Ada', 'Ada']
  },
  6: {
    key: 'Gigi Anomali',
    options: ['-', 'Tidak Ada', 'Ada']
  },
}; 
const jsonExtra= JSON.parse(props.pasienCheckupExtra.keterangan);
const extra = useForm({ isi: jsonExtra?? {} });
const saveExtra = () => {
  extra.transform((data) => ({ ...data, kode: 'extra', pasien:antrean.pasien }))
    .post(route('pemeriksaan.store_checkup_extra'), {

    });
}
</script>

<template>
  <div>
    <div class="grid grid-flow-col justify-center gap-2 text-center">
      <div v-for="i in range(1, 17)" :key="i">
        <span class="block">{{ petak[i].k }}</span>
        <Tooth :h="60" :w="30" :tooth="teeth[i]" :tipe="petak[i].v" @changePosition="changePosition"
          @click="selectTooth(i)">
          <Non :kode="listOdo[teeth[i].condition].kode" />
        </Tooth>
      </div>
    </div>
    <div class="grid grid-flow-col justify-center gap-2 text-center">
      <div v-for="i in range(17, 27)" :key="i">
        <span class="block">{{ petak[i].k }}</span>
        <Tooth :h="60" :w="30" :tooth="teeth[i]" :tipe="petak[i].v" @changePosition="changePosition"
          @click="selectTooth(i)">
          <Non :kode="listOdo[teeth[i].condition].kode" />
        </Tooth>
      </div>
    </div>
    <div class="grid grid-flow-col justify-center gap-2 text-center">
      <div v-for="i in range(27, 37)" :key="i">
        <Tooth :h="60" :w="30" :tooth="teeth[i]" :tipe="petak[i].v" @changePosition="changePosition"
          @click="selectTooth(i)">
          <Non :kode="listOdo[teeth[i].condition].kode" />
        </Tooth>
        <span class="block">{{ petak[i].k }}</span>
      </div>
    </div>
    <div class="grid grid-flow-col justify-center gap-2 text-center">
      <div v-for="i in range(37, 53)" :key="i">
        <Tooth :h="60" :w="30" :tooth="teeth[i]" :tipe="petak[i].v" @changePosition="changePosition"
          @click="selectTooth(i)">
          <Non :kode="listOdo[teeth[i].condition].kode" />
        </Tooth>
        <span class="block">{{ petak[i].k }}</span>
      </div>
    </div>

    <div id="extra" class="print:hidden grid grid-cols-2 bg-orange-100" v-show="route().current()!='pemeriksaan.cetak'">
      <VanillaInputGroup v-for="i in optionExtra" :label="i.key" variant="inline">
        <VanillaSelect :options="i.options" v-model="extra.isi[i.key]" />
        <VanillaInput v-model="extra.isi[i.key + 'b']" v-if="extra.isi[i.key] == 'Ada'" />
      </VanillaInputGroup>
      <VanillaInputGroup label="Lain-Lain" variant="inline">
        <VanillaInput v-model="extra.isi['lain']" />
      </VanillaInputGroup>
      <div class="grid grid-cols-3">
        <VanillaInputGroup label="D" variant="inline">
          <VanillaInput v-model="extra.isi['d']" />
        </VanillaInputGroup>
        <VanillaInputGroup label="M" variant="inline">
          <VanillaInput v-model="extra.isi['m']" />
        </VanillaInputGroup>
        <VanillaInputGroup label="F" variant="inline">
          <VanillaInput v-model="extra.isi['f']" />
        </VanillaInputGroup>
      </div>
      <BaseButton label="Reset" @click="extra.reset()" color="danger" />
      <BaseButton label="Simpan" @click="saveExtra" color="info" />
    </div>

    <CardBoxModalEmpty v-model="showModalOdo">
      <div class="grid grid-cols-3 bg-white">
        <div class="col-span-1">
          <div class="text-center text-5xl font-bold">{{ petak[tooth.number].k }}</div>
          <Tooth :h="300" :w="300" :highlight="highlight" @changePosition="changePosition" :tipe="petak[tooth.number].v"
            :tooth="tooth">
            <Non :kode="listOdo[tooth.condition].kode" />
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
              <div class="bg-white text-center pt-4">Gigi nomor : <span class="text-lg font-bold"> {{
                petak[tooth.number].k }}
                  posisi {{ position
                  }}</span></div>
              <DiagnosaOdo :list-odo="listOdo" @diagnosaGigi="diagnosaGigi" :selected="tooth.condition" />
              <BaseButton label="Simpan" color="info" @click="saveOdo" class="float-right me-10" />
              <BaseButton label="Batal" color="danger" @click="{ showModalOdo = false; tooth.reset }"
                class="float-right me-10" />
            </div>
          </div>
        </div>
      </div>
    </CardBoxModalEmpty>
  </div>
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
}
</style>