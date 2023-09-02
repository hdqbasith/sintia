<script setup>
import BaseButton from '@/components/BaseButton.vue';
import CardBox from '@/components/CardBox.vue';
import { VanillaInput, VanillaInputGroup, VanillaRichSelect, VanillaSelect, VanillaTextarea } from '@flavorly/vanilla-components';
import { useForm, usePage } from '@inertiajs/vue3';
import { mdiContentSave } from '@mdi/js';

const antrean= usePage().props.antrean?? null;
const listDiadnosa=usePage().props.listDiadnosa;
const listTerapi=usePage().props.listTerapi;
const pasienRecord=usePage().props.pasienRecord;
const form = useForm({
  pasien:antrean?.pasien,
  subjective: pasienRecord?.subjective,
  objective: pasienRecord?.objective,
  assessment: pasienRecord?.assessment,
  planning: pasienRecord?.planning,
  detail: pasienRecord?.detail,
  prescription: pasienRecord?.prescription,
  cost: pasienRecord?.cost,
})
const submit=()=>{
  form.post(route('pemeriksaan.store_record'),{
    onSuccess:()=>{

    }
  })
}

</script>

<template>
  <CardBox is-form @submit.prevent="submit" class="">
    <div class="sm:grid sm:grid-cols-2">
      <div>
        <VanillaInputGroup label="Subyektif (Keluhan)" name="subjective" >
          <VanillaTextarea v-model="form.subjective" name="subjective" rows="4" />
        </VanillaInputGroup>
        <VanillaInputGroup label="Obyektif (Pemeriksaan)" name="objective">
          <VanillaTextarea v-model="form.objective" name="objective" />
        </VanillaInputGroup>
        <VanillaInputGroup label="Assessment (Diagnosa)" name="assessment">
          <VanillaRichSelect v-model="form.assessment" :options="listDiadnosa" name="assessment" />
        </VanillaInputGroup>
      </div>
      <div>
        <VanillaInputGroup label="Plan (Terapi)" name="plan">
          <VanillaRichSelect :options="listTerapi" v-model="form.planning" name="plan" />
          <VanillaTextarea v-model="form.detail" />
        </VanillaInputGroup>
        <VanillaInputGroup label="Resep Obat" name="prescription">
          <VanillaTextarea v-model="form.prescription" name="prescription" />
        </VanillaInputGroup>
        <VanillaInputGroup label="Biaya Periksa" name="cost">
          <VanillaInput v-model="form.cost" name="cost" placeholder="Rp"/>
        </VanillaInputGroup>
      </div>
    </div>
    <BaseButton type="submit" label="Simpan" color="info" class="w-full" :icon="mdiContentSave" icon-size="50" />
  </CardBox>
</template>
