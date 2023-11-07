<script setup>
import BaseButton from '@/components/BaseButton.vue';
import CardBox from '@/components/CardBox.vue';
import FormCheckRadio from '@/components/FormCheckRadio.vue';
import { Checkbox, CheckboxGroup, VanillaCheckbox, VanillaInput, VanillaInputGroup, VanillaSelect } from '@flavorly/vanilla-components';
import { router, useForm, usePage } from '@inertiajs/vue3';
import { mdiContentSave } from '@mdi/js';

import { ref, nextTick, onMounted } from "vue";
defineProps({
  listCheckup: Object,
  pasienCheckup: Object,
})
const antrean = usePage().props.antrean ?? null;
const pasienCheckup = usePage().props.pasienCheckup;
const medisInput = [
  { text: 'Penyakit lainnya', value: '16', },
  { text: 'Alergi terhadap obat-obatan', value: '17', },
  { text: 'Alergi terhadap makanan', value: '18', },
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
const mc = ref({});
const mi = ref({});
const eo = ref({});
const io = ref({});
const itemRefs = ref([]);
const checkShowInput = (a, b, c) => {
  mi.value[a] = b;
  nextTick(() => {
    itemRefs.value[c].focus();
  });
  mc.value[a] = null;
}
const eoValue = (a, b) => {
  eo.value[a] = b;
}
const ioValue = (a, b) => {
  io.value[a] = b;
}
Object.keys(pasienCheckup).forEach(p => {
  if (pasienCheckup[p].group == 'mc') mc.value[p] = true;
  else if (pasienCheckup[p].group == 'mi') {
    mc.value[p] = true;
    mi.value[p] = pasienCheckup[p].keterangan;
  }
  else if (pasienCheckup[p].group == 'eo') eo.value[p] = pasienCheckup[p].keterangan;
  else if (pasienCheckup[p].group == 'io') io.value[p] = pasienCheckup[p].keterangan;
  else if (pasienCheckup[p].keterangan == 'Ada Kelainan') io.value[p] = pasienCheckup[p].keterangan;
});
const submit = () => {
  const data = {};
  Object.assign(data, mc.value, mi.value, eo.value, io.value, { pasien: antrean?.pasien });
  const form = useForm(data);
  form.post(route("pemeriksaan.store_checkup"), {
    onSuccess: () => {
    }
  });
}
const classInput = 'text-sm appearance-none w-10/12 focus:outline-none shadow disabled:opacity-50 disabled:cursor-not-allowed border-0 border-0 text-gray-700 dark:text-white placeholder-gray-500/60 bg-white dark:bg-gray-900 ring-1 ring-inset focus:ring-inset focus:ring-2 ring-gray-300 focus:ring-primary-600 dark:ring-white/20 dark:focus:ring-primary-600 focus-visible:ring-primary-600 px-4 py-3 !autofill:bg-white !dark:autofill:bg-gray-900 rounded-lg';
</script>

<template>
  <div class="sm:grid sm:grid-cols-3 gap-6">
    <div class="mb-5">
      <div class="text-xl font-bold">Data Medis</div>
      {{ mc }}
      {{ mi }}
      <div>
        <FormCheckRadio v-for="m in medisCheck" :label="m.text" class="flex" :name="m.value" :input-value="true"
          v-model="mc[m.value]"/>
        <div v-for="m, i in medisInput">
          <FormCheckRadio :label="m.text" class="flex" :name="m.value" :input-value="true" v-model="mc[m.value]"
            @update:model-value="checkShowInput(m.value, $event, i)" />
          <input v-show="mi[m.value]" :class="classInput" class="ms-6" placeholder="sebutkan" autofocus="true"
            v-model="mi[(m.value)]" ref="itemRefs" />
        </div>
      </div>
    </div>
    <div>
      <div class="text-xl font-bold">Ekstra Oral</div>
      <div v-for="m in extraOral" class="-ms-6">
        <VanillaInputGroup :label="m.text" variant="inline" :padding="false" :for="m.value">
          <VanillaSelect :options="m.options" class="mt-1 w-11/12 " @update:modelValue="eoValue(m.value, $event)"
            placeholder="pilih" :name="m.value" v-model="eo[m.value]"/>
          <input :class="classInput" class="w-10/12 ms-6" v-if="eo[27] == 'Ada Kelainan' && m.value == 27"
            placeholder="sebutkan" v-model="eo['27b']" />
        </VanillaInputGroup>
      </div>
    </div>
    <div>
      <div class="text-xl font-bold">Intra Oral</div>
      <div v-for="m in intraOral" class="-ms-6">
        <VanillaInputGroup :label="m.text" variant="inline" :padding="false" :for="m.value">
          <VanillaSelect :options="m.options" class="mt-1 w-11/12" @update:modelValue="ioValue(m.value, $event)"
            placeholder="pilih" :name="m.value" v-model="io[m.value]" />
          <input :class="classInput" class="w-10/12 ms-6" v-if="io[m.value] == 'Ada Kelainan'" placeholder="sebutkan"
            v-model="io[m.value + 'b']" />
        </VanillaInputGroup>
      </div>
    </div>
    <BaseButton label="Simpan" @click="submit" color="info" class="w-fit" :icon="mdiContentSave" icon-size="50" />
  </div>
</template>