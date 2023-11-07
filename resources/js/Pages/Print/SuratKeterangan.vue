<script setup>
import { usePage } from '@inertiajs/vue3';
import FormOdontogram from '../Form/FormOdontogram.vue';

const props=usePage().props;
</script>
<template>
  <div style="width: 900px;">
    <div id="kop" class="pb-4 border-b-2 border-black mb-4">
      <img src="/image/logo.jpg" class="w-36 float-left">
      <h2 class="text-2xl font-bold text-center text-green-600">PRAKTIK DOKTER GIGI<br>drg. Dyaswara T. Ajeng
      </h2>
      <h3 class="text-xl font-bold text-center text-green-600">Gang Mawar RT 01 RW 01 Pedawang Bae Kudus<br>HP:
        0878-7742-5944</h3>
    </div>
    <div id="isi" class="ms-6">

      <p>Yang bertanda tangan dibawah ini :</p>
      <p>Nama: drg. Dyaswara T. Ajeng</p>
      <br>
      <p>menerangkan bahwa</p>
      <p>Nama: {{ props.antrean.daftar_pasien.nama }}</p>
      <p>Alamat: {{ props.antrean.daftar_pasien.alamat }}</p>
      <p>Dinyatakan Sehat / Tidak Sehat berdasarkan hasil pemeriksaan dibawah ini:</p>
      <FormOdontogram :pasien-odo="props.pasienOdo" :pasienCheckupExtra="props.pasienCheckupExtra"/>
      <p>Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.</p>
    </div>
    <div id="ttd" class="ml-96 mt-3">
      <p>Kudus, {{ Date.now() }}</p>
      <p>Dokter Gigi</p>
      <p class="mt-10">drg. Dyaswara T. Ajeng</p>
    </div>
  </div>
</template>