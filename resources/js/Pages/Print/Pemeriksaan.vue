<script setup>
import { usePage } from "@inertiajs/vue3";
import { range } from "lodash";
import { onMounted, reactive, ref } from "vue";
import vPrint from 'vue3-print-nb';
import FormOdontogram from "../Form/FormOdontogram.vue";
import { VanillaInput, VanillaInputGroup, VanillaRichSelect, VanillaSelect, VanillaTextarea } from '@flavorly/vanilla-components';

const props = usePage().props;
onMounted(() => {
  // print()
})
const indexTabel = {
  1: '11 [51] ',
  2: '12 [52] ',
  3: '13 [53] ',
  4: '14 [54] ',
  5: '15 [55] ',
  6: '16',
  7: '17',
  8: '18',
  9: '[61] 21',
  10: '[62] 22',
  11: '[63] 23',
  12: '[64] 24',
  13: '[65] 25',
  14: '26',
  15: '27',
  16: '28',
  17: '48',
  18: '47',
  19: '46',
  20: '45[85] ',
  21: '44[84] ',
  22: '43[83] ',
  23: '42[82] ',
  24: '41[81] ',
  25: '38',
  26: '37',
  27: '36',
  28: '75[35] ',
  29: '74[34] ',
  30: '73[33] ',
  31: '72[32] ',
  32: '71[31]',
};
const mapTabel = (a, b) => {
  return a + ': ' + (props.pasienOdo[b] && props.pasienOdo[b]?.condition ? props.pasienOdo[b].daftar_odontogram.arti : 'Normal\/baik')
}
const odoTabel = {
  1: mapTabel(11, 8) + ' ' + mapTabel(51, 21),
  2: mapTabel(12, 7) + ' ' + mapTabel(52, 20),
  3: mapTabel(13, 6) + ' ' + mapTabel(53, 19),
  4: mapTabel(14, 5) + ' ' + mapTabel(54, 18),
  5: mapTabel(15, 4) + ' ' + mapTabel(55, 17),
  6: mapTabel(16, 3),
  7: mapTabel(17, 2),
  8: mapTabel(18, 1),
  9: mapTabel(61, 22) + ' ' + mapTabel(21, 9),
  10: mapTabel(62, 23) + ' ' + mapTabel(22, 10),
  11: mapTabel(63, 24) + ' ' + mapTabel(23, 11),
  12: mapTabel(64, 25) + ' ' + mapTabel(24, 12),
  13: mapTabel(65, 26) + ' ' + mapTabel(25, 13),
  14: mapTabel(26, 14),
  15: mapTabel(27, 15),
  16: mapTabel(28, 16),
  17: mapTabel(48, 37),
  18: mapTabel(47, 38),
  19: mapTabel(46, 39),
  20: mapTabel(45, 40) + ' ' + mapTabel(85, 27),
  21: mapTabel(44, 41) + ' ' + mapTabel(84, 28),
  22: mapTabel(43, 42) + ' ' + mapTabel(83, 29),
  23: mapTabel(42, 43) + ' ' + mapTabel(82, 30),
  24: mapTabel(41, 44) + ' ' + mapTabel(81, 31),
  25: mapTabel(38, 52),
  26: mapTabel(37, 51),
  27: mapTabel(36, 50),
  28: mapTabel(75, 36) + ' ' + mapTabel(35, 49),
  29: mapTabel(74, 35) + ' ' + mapTabel(34, 48),
  30: mapTabel(73, 34) + ' ' + mapTabel(33, 47),
  31: mapTabel(72, 33) + ' ' + mapTabel(32, 46),
  32: mapTabel(71, 32) + ' ' + mapTabel(31, 45),
}
const optionExtra = {
  1: {
    key: 'Occlusi',
    options: ['-','Normal Bite', 'Cross Bite', 'Steep Bite']
  },
  2: {
    key: 'Torus Palatinus',
    options: ['-','Tidak Ada', 'Kecil', 'Sedang', 'Besar', 'Multiple']
  },
  3: {
    key: 'Torus Mandibularis',
    options: ['-','Tidak ada', 'sisi kiri', 'sisi kanan', 'kedua sisi']
  },
  4: {
    key: 'Palatum',
    options: ['-','Dalam', 'Sedang', 'Rendah']
  },
  5: {
    key: 'Diastema',
    options: ['-','Tidak Ada', 'Ada']
  },
  6: {
    key: 'Gigi Anomali',
    options: ['-','Tidak Ada', 'Ada']
  },
};
const extra= JSON.parse(props.pasienCheckupExtra.keterangan);

</script>

<template>
  <div class="w-fit " style="width: 960px;">
    <div id="kop" class="border-b-2 mb-5 pb-4">
      <img src="/image/logo.jpg" class="w-36 float-left">
      <h2 class="text-2xl font-bold text-center text-green-600">REKAM MEDIS KEDOKTERAN GIGI<br>drg. Dyaswara T. Ajeng</h2>
      <h3 class="text-xl font-bold text-center text-green-600">Gang Mawar RT 01 RW 01 Pedawang Bae Kudus<br>HP:
        0878-7742-5944</h3>

    </div>
    <div id="identitas" class="border-b-2 mb-5 pb-4">
      <div class="grid grid-cols-2">
        <div class="grid grid-cols-4">
          <div class="col-span-1">
            Nama<br>
            No. RM
          </div>
          <div class="col-span-3">
            : {{ props.antrean.daftar_pasien.nama }}<br>
            : {{ props.antrean.daftar_pasien.id }}
          </div>
        </div>
        <div class="grid grid-cols-4">
          <div class="col-span-1">
            Jenis Kelamin<br>
            TTL
          </div>
          <div class="col-span-3">
            : {{ props.antrean.daftar_pasien.gender }}<br>
            : {{ props.antrean.daftar_pasien.tempat_lahir }}, {{
              props.antrean.daftar_pasien.tanggal_lahir.split('-').reverse().join('-') }}
          </div>
        </div>

      </div>
    </div>
    <div id="tabelAtas">
      <h2 class="text-lg font-bold">Lembar Odontogram</h2>
      <table class="border-2 border-black w-full">
        <tbody>
          <tr v-for="i in range(1, 9)">
            <td class="w-1/12 text-center">{{ indexTabel[i] }}</td>
            <td class="w-5/12">&nbsp;&nbsp; {{ odoTabel[i] }}</td>
            <td class="w-5/12">&nbsp;&nbsp; {{ odoTabel[i + 8] }}</td>
            <td class="w-1/12 text-center">{{ indexTabel[i + 8] }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div id="odontogram">
      <FormOdontogram :pasien-odo="props.pasienOdo" :pasienCheckupExtra="props.pasienCheckupExtra" />
    </div>
    <div id="tabelBawah">
      <table class="border-2 border-black w-full">
        <tbody>
          <tr v-for="i in range(17, 25)">
            <td class="w-1/12 text-center">{{ indexTabel[i] }}</td>
            <td class="w-5/12">&nbsp;&nbsp; {{ odoTabel[i] }}</td>
            <td class="w-5/12">&nbsp;&nbsp; {{ odoTabel[i + 8] }}</td>
            <td class="w-1/12 text-center">{{ indexTabel[i + 8] }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div id="detail">
      <div v-for="i in optionExtra" class="inline">
        <div class="inline-block font-bold w-2/12">{{ i.key }}</div>
        <div class="inline-block w-4/12 align-top">: {{ extra[i.key]?? '' + (extra[i.key + 'b']? ', '+extra[i.key + 'b']:'') }}</div>
      </div>
      <div class="inline-block font-bold w-2/12">Lain-Lain</div>
      <div class="inline-block w-4/12 align-top">: {{ extra['lain']?? '' }}</div>
      <div class="inline-block w-6/12 align-top">
        <div class="inline-block w-1/3"><strong>D</strong> : {{ extra['d']?? '' }}</div>
        <div class="inline-block w-1/3"><strong>M</strong> : {{ extra['m']?? '' }}</div>
        <div class="inline-block w-1/3"><strong>F</strong> : {{ extra['f']?? '' }}</div>
      </div>
    </div>
    <div id="ttd" class="grid grid-cols-3 mt-5 border-2 border-black">
      <div>
        Diperiksa oleh:<br>
        drg. Dyaswara T. Ajeng
      </div>
      <div>
        Tanggal Pemeriksaan:<br>
        {{ props.antrean.booking_mulai.split(' ')[0].split('-').reverse().join('-') }}
      </div>
      <div>
        Tanda Tangan Pemeriksa<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
        (......................................)
      </div>

    </div>

  </div>
</template>
<style>
  label span{
    font-weight: bold;
    color: black;
  }
</style>
