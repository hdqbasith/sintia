<script setup>
import BaseButton from "@/components/BaseButton.vue";
import CardBox from "@/components/CardBox.vue";
import NotificationBarInCard from "@/components/NotificationBarInCard.vue";
import SectionMain from "@/components/SectionMain.vue";
import SectionTitle from "@/components/SectionTitle.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import { DateTimeInput, FormSection, InputGroup, VanillaInput, VanillaSelect } from "@flavorly/vanilla-components";
import { router, useForm, usePage } from "@inertiajs/vue3";
import { isNull, toArray } from "lodash";
import { ref, computed, watch } from "vue";
import { toast } from "vue3-toastify";

const masks = ref({
  input: 'DD-MM-YYYY',
});
const props = defineProps({
  pasien: {
    type: Object,
    default: null
  },
  modelValue: {
    type: [String, Number, Boolean],
    default: null,
  },
});
const form = useForm({
  id: '',
  nomor_rm: '',
  nama: '',
  tempat_lahir: '',
  tanggal_lahir: '',
  nik: '',
  bpjs: '',
  gender: 'P',
  pekerjaan: '',
  alamat: '',
  hp: '',
  goldar: '',
  akun: '',
  klinik: 1,
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

watch(() => props.pasien, (p) => {
  if (p == 'reset') form.reset();
  else Object.keys(p).forEach(a => {
    form[a] = p[a];
  })
})
const mGoldar = ['', 'A', 'B', 'AB', 'O'];
const submit = () => {
  // emit('loading', 0);
  form
    .transform((data) => ({
      ...data,
    }))
    .post(route("pasien.store"), {
      preserveScroll: true,
      onSuccess: () => {
        toast.success('ok');
        router.visit('/pasien/list');;
        // emit('loading', 1);
      },
    });
};
</script>
<template>
  <CardBox is-form @submit.prevent="submit" class="">
    <NotificationBarInCard color="info">Biodata Pasien</NotificationBarInCard>
    <FormSection divided autocomplete="off">
      <div class="grid grid-cols-1 sm:grid-cols-2">
        <div>
          <InputGroup label="No. RM" name="nomor_rm" variant="inline">
            <VanillaInput v-model="form.nomor_rm" name="nomor_rm" placeholder="No. Rekam Medis"
              @keyup="form.errors.nomor_rm = null" :errors="form.errors.nomor_rm" />
          </InputGroup>
          <InputGroup label="Nama" name="nama" variant="inline">
            <VanillaInput v-model="form.nama" name="nama" placeholder="Nama" @keyup="form.errors.nama = null"
              :errors="form.errors.nama" />
          </InputGroup>
          <InputGroup label="Jenis Kelamin" name="nama" variant="inline">
            <div class="grid grid-cols-3 gap-y-2 gap-x-2">
              <BaseButton label="L" @click="form.gender = 'L'" :color="form.gender == 'L' ? 'info' : 'light'" />
              <BaseButton label="P" @click="form.gender = 'P'" :color="form.gender == 'P' ? 'info' : 'light'" />
            </div>
          </InputGroup>
          <InputGroup label="TTL" name="tempat_lahir" variant="inline">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-2 gap-x-2">
              <VanillaInput v-model="form.tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" />
              <DateTimeInput v-model="form.tanggal_lahir" :is-required="false" :inline="false" mode="date"
                placeholder="Tanggal Lahir" :masks="masks" />
            </div>
          </InputGroup>
          <InputGroup label="NIK" name="nik" variant="inline">
            <VanillaInput v-model="form.nik" name="nik" placeholder="NIK" @keyup="form.errors.nik = null"
              :errors="form.errors.nik" />
          </InputGroup>
        </div>
        <div>
          <InputGroup label="No. BPJS" name="bpjs" variant="inline">
            <VanillaInput v-model="form.bpjs" name="bpjs" placeholder="No. BPJS" @keyup="form.errors.bpjs = null"
              :errors="form.errors.bpjs" />
          </InputGroup>
          <InputGroup label="Pekerjaan" name="pekerjaan" variant="inline">
            <VanillaInput v-model="form.pekerjaan" name="pekerjaan" placeholder="Pekerjaan"
              @keyup="form.errors.pekerjaan = null" :errors="form.errors.pekerjaan" />
          </InputGroup>
          <InputGroup label="Alamat" name="alamat" variant="inline">
            <VanillaInput v-model="form.alamat" name="alamat" placeholder="Alamat" @keyup="form.errors.alamat = null"
              :errors="form.errors.alamat" />
          </InputGroup>
          <InputGroup label="No. HP" name="hp" variant="inline">
            <VanillaInput v-model="form.hp" name="hp" placeholder="No. HP" @keyup="form.errors.hp = null"
              :errors="form.errors.hp" />
          </InputGroup>
          <InputGroup label="Golongan Darah" name="role" variant="inline">
            <VanillaSelect v-model="form.goldar" name="role" placeholder="Golongan Darah" :options="mGoldar"
              :errors="form.errors.goldar" />
          </InputGroup>
          <div class="text-right me-10">
            <BaseButton label="Cancel" color="danger" class="me-2 mt-3" @click="cancel" />
            <BaseButton label="Simpan >" type="submit" color="info" :disabled="!form.isDirty" />
          </div>
        </div>
      </div>
    </FormSection>
  </CardBox>
</template>
