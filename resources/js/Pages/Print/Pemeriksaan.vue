<script setup>
import { usePage } from "@inertiajs/vue3";
import { range } from "lodash";
import { onMounted, reactive, ref } from "vue";
import vPrint from 'vue3-print-nb';
import FormOdontogram from "../Form/FormOdontogram.vue";
import { VanillaInput, VanillaInputGroup, VanillaRichSelect, VanillaSelect, VanillaTextarea } from '@flavorly/vanilla-components';
import FormCheckRadio from "@/components/FormCheckRadio.vue";
import BaseIcon from "@/components/BaseIcon.vue";
import { mdiCheckCircleOutline, mdiCheckOutline, mdiCircleOutline, mdiCloseCircleOutline } from "@mdi/js";

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
  return (props.pasienOdo[b] && props.pasienOdo[b]?.condition ? a + ': ' + props.pasienOdo[b].daftar_odontogram.arti : '')
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
const extra = JSON.parse(props.pasienCheckupExtra.keterangan);

const col1 = {
  nomor_rm: 'No. RM',
  nama: 'Nama',
  tempat_lahir: 'Tempat Lahir',
  tanggal_lahir: 'Tanggal Lahir',
  nik: 'NIK',
  bpjs: 'No. BPJS',
};
const col2 = {
  gender: 'L/P',
  pekerjaan: 'Pekerjaan',
  alamat: 'Alamat',
  hp: 'No. HP',
  goldar: 'Golongan Darah',
};
const medisInput = [
  { text: 'Kesadaran', value: '19', },
  { text: 'Tekanan Darah', value: '20', },
  { text: 'Pernafasan', value: '21', },
  { text: 'Kondisi Umum', value: '22', },
  { text: 'Denyut Nadi', value: '23', },
  { text: 'Suhu Tubuh', value: '24', },

];
const medisCheck = [
  { text: 'Penyakit Jantung', value: '11', },
  { text: 'Diabetes', value: '12', },
  { text: 'Haemopilia', value: '13', },
  { text: 'Hepatitis', value: '14', },
  { text: 'Gastring', value: '15', },
  { text: 'Penyakit lainnya', value: '16', },
  { text: 'Alergi terhadap obat-obatan', value: '17', },
  { text: 'Alergi terhadap makanan', value: '18', },
];
const extraOral = [
  { text: 'Relasi Bibir', value: '25', options: ['', 'Competent', 'Incompetent'] },
  { text: 'Tonus Bibir', value: '26', options: ['', 'Normal', 'Hipotonus', 'Hipertonus'] },
  { text: 'TMJ', value: '27', options: ['', 'Normal', 'Ada Kelainan'] },
  { text: 'Kelenjar Limfa', value: '28', options: ['', 'Teraba', 'Teraba Sakit'] },
  { text: 'Wajah', value: '29', options: ['', 'Asimetris', 'Simetris'] },
];
const intraOral = [
  { text: 'Kebersihan Mulut', value: '31', options: ['', 'Baik', 'Sedang', 'Buruk'] },
  { text: 'Mukosa Bukkal', value: '32', options: ['', 'Normal', 'Ada Kelainan'] },
  { text: 'Mukosa Lingual', value: '33', options: ['', 'Normal', 'Ada Kelainan'] },
  { text: 'Frenulum Labial', value: '34', options: ['', 'Normal', 'Rendah'] },
  { text: 'Lidah', value: '35', options: ['', 'Normal', 'Ada Kelainan'] },
  { text: 'Palatum', value: '36', options: ['', 'Normal', 'Dangkal'] },
  { text: 'Tonsil', value: '37', options: ['', 'Normal', 'Ada Kelainan'] },
  { text: 'Hubungan Oklusi', value: '38', options: ['', 'I Angle', 'II Angle Div I', 'II Angle Div II', 'III Angle'] },
];
const mc = ref([]);
const mi = ref({});
const eo = ref({});
const io = ref({});
const pasienCheckup = props.pasienCheckup;
Object.keys(pasienCheckup).forEach(p => {
  if (pasienCheckup[p].group == 'mc') mc.value[p] = true;
  else if (pasienCheckup[p].group == 'mi') {
    mc.value[p] = true;
    mi.value[p] = ": " + pasienCheckup[p].keterangan;
    if (pasienCheckup[p].kode == 16) mc.value[p] = pasienCheckup[p].keterangan;
  }
  else if (pasienCheckup[p].group == 'eo') eo.value[p] = pasienCheckup[p].keterangan;
  else if (pasienCheckup[p].group == 'io') io.value[p] = pasienCheckup[p].keterangan;
  else if (pasienCheckup[p].keterangan == 'Ada Kelainan') io.value[p] = pasienCheckup[p].keterangan;
});

const pasienRecord=props.pasienRecord;
const soap = reactive({
  subjective: pasienRecord?.subjective,
  objective: pasienRecord?.objective,
  assessment: pasienRecord?.assessment,
  planning: pasienRecord?.planning,
  detail: pasienRecord?.detail,
  prescription: pasienRecord?.prescription,
  cost: pasienRecord?.cost,
})
const listDiadnosa=props.listDiadnosa;
const listTerapi=props.listTerapi;
</script>

<template>
  <div class="" style="width: 960px;">
    <div id="kop" class="border-b-2 mb-5 pb-4">
      <img src="/image/logo.jpg" class="w-36 float-left">
      <h2 class="text-2xl font-bold text-center text-green-600">REKAM MEDIS KEDOKTERAN GIGI<br>drg. Dyaswara T. Ajeng</h2>
      <h3 class="text-xl font-bold text-center text-green-600">Gang Mawar RT 01 RW 01 Pedawang Bae Kudus<br>HP:
        0878-7742-5944</h3>
    </div>
    <div id="identitas">
      <h2 class="text-lg font-bold">Data Diri Pasien</h2>
      <div class="grid grid-cols-2 p-5 border border-black">
        <div>
          <div class="grid grid-cols-3 items-start gap-4 content-center" v-for="(c, i) in col1">
            <div class="flex justify-start items-center">
              {{ c }}
            </div>
            <div class="col-span-2 mt-0 flex flex-col">
              : 
              {{ props.antrean.daftar_pasien != null ? props.antrean.daftar_pasien[i] : '' }}
            </div>
          </div>
        </div>
        <div>
          <div class="grid grid-cols-3 items-start gap-4 content-center" v-for="(c, i) in col2">
            <div class="flex justify-start items-center">
              {{ c }}
            </div>
            <div class="col-span-2 mt-0 flex flex-col">
              :
              {{ props.antrean.daftar_pasien != null ? props.antrean.daftar_pasien[i] : '' }}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="data_medis">
      <div class="grid grid-cols-2 mt-5">
        <div class=" p-5 border border-black">
          <h2 class="text-lg font-bold">Data Medis</h2>
          <div v-for="m in medisCheck">
            <BaseIcon v-if="mc[m.value]" :path="mdiCheckCircleOutline" />
            <BaseIcon v-else :path="mdiCircleOutline" />
            {{ m.text }}
            {{ m.value >= 16 && mc[m.value] ? ": " + mc[m.value] : "" }}
          </div>
        </div>
        <div class=" p-5 border border-black">
          <h2 class="text-lg font-bold">Pemeriksaan Fisik</h2>
          <div v-for="m in medisInput">
            <BaseIcon v-if="mi[m.value]" :path="mdiCheckCircleOutline" />
            <BaseIcon v-else :path="mdiCircleOutline" />
            {{ m.text }}
            {{ mi[m.value] == ": " ? mi[(m.value)] : "" }}
          </div>
        </div>
      </div>
      <div class="grid grid-cols-2 mt-5">
        <div class=" p-5 border border-black">
          <h2 class="text-lg font-bold">Pemeriksaan Ekstra Oral</h2>
          <div v-for="m in extraOral">
            <BaseIcon v-if="eo[m.value]=='Ada Kelainan'||eo[m.value]=='Normal'" :path="mdiCheckCircleOutline" />
            <BaseIcon v-else :path="mdiCircleOutline" />
            {{ m.text }}
            {{ eo[m.value]=="Normal"? ": Normal":"" }}
            {{ eo[(m.value)]=='Ada Kelainan' && eo[(m.value + "b")]  ? ": " + eo[(m.value + "b")] : "" }}
          </div>
        </div>
        <div class=" p-5 border border-black">
          <h2 class="text-lg font-bold">Pemeriksaan Intra Oral</h2>
          <div v-for="m in intraOral">
            <BaseIcon v-if="io[m.value]=='Ada Kelainan'||io[m.value]=='Normal'" :path="mdiCheckCircleOutline" />
            <BaseIcon v-else :path="mdiCircleOutline" />
            {{ m.text }}
            {{ io[m.value]=="Normal"? ": Normal":"" }}
            {{ io[(m.value)]=='Ada Kelainan' && io[(m.value + "b")] ? ": " + io[(m.value + "b")] : "" }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="w-fit break-before-page" style="width: 960px;">
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
        <div class="inline-block w-4/12 align-top">: {{ extra[i.key] ?? '' + (extra[i.key + 'b'] ? ', ' + extra[i.key +
          'b'] : '') }}</div>
      </div>
      <div class="inline-block font-bold w-2/12">Lain-Lain</div>
      <div class="inline-block w-4/12 align-top">: {{ extra['lain'] ?? '' }}</div>
      <div class="inline-block w-6/12 align-top">
        <div class="inline-block w-1/3"><strong>D</strong> : {{ extra['d'] ?? '' }}</div>
        <div class="inline-block w-1/3"><strong>M</strong> : {{ extra['m'] ?? '' }}</div>
        <div class="inline-block w-1/3"><strong>F</strong> : {{ extra['f'] ?? '' }}</div>
      </div>
    </div>
    <div id="ttd" class="grid grid-cols-3 mt-5 border-2 border-black p-5">
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
  <div class="w-fit break-before-page" style="width: 960px;">
    <div id="soap" class="border-b-2 mb-5 pb-4">
      <img src="/image/logo.jpg" class="w-36 float-left">
      <h2 class="text-2xl font-bold text-center text-green-600">REKAM MEDIS KEDOKTERAN GIGI<br>drg. Dyaswara T. Ajeng</h2>
      <h3 class="text-xl font-bold text-center text-green-600">Gang Mawar RT 01 RW 01 Pedawang Bae Kudus<br>HP:
        0878-7742-5944</h3>

    </div>
    <div class="mt-5">
      <h2 class="text-lg font-bold">Subyektif</h2>
      <p v-text="soap.subjective" class="border border-black p-5"></p>
    </div>
    <div class="mt-5">
      <h2 class="text-lg font-bold">Obyektif</h2>
      <p v-text="soap.objective" class="border border-black p-5"></p>
    </div>
    <div class="mt-5">
      <h2 class="text-lg font-bold">Assessment</h2>
      <p v-text="listDiadnosa[soap.assessment].text" class="border border-black p-5"></p>
    </div>
    <div class="mt-5">
      <h2 class="text-lg font-bold">Planning</h2>
      <p v-html="listTerapi[soap.planning].text +'<br>'+soap.detail" class="border border-black p-5"></p>
    </div>
    <div class="mt-5">
      <h2 class="text-lg font-bold">Biaya: Rp {{ parseInt(soap.cost).toLocaleString().replace(",",".") }},-</h2>
    </div>
    <div id="ttd" class="grid grid-cols-3 mt-5 border-2 border-black p-5">
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
label span {
  font-weight: bold;
  color: black;
}
</style>
