<script setup>
import BaseButton from "@/components/BaseButton.vue";
import CardBox from "@/components/CardBox.vue";
import CardBoxModal from "@/components/CardBoxModal.vue";
import MdiIcon from "@/components/MdiIcon.vue";
import { ref, computed, reactive } from "vue";
import {
  FormSection,
  InputGroup,
  Input as VanillaInput,
  Select as VanillaSelect,
} from '@flavorly/vanilla-components';
import { Link, useForm, usePage } from "@inertiajs/vue3";

const props = defineProps({ menu: Object });
const menu = props.menu;
const form = useForm({
  id:'',
  parent: '',
  order: '',
  name: '',
  link: '',
  level: '',
  active: '',
  icon: '',
});
const mRole = ['admin', 'dokter', 'perawat', 'kasir', 'pasien'];
const mAktif = { 1: 'Aktif', 0: 'Tidak Aktif' };
const showIconModal = ref(false);
const closeModal = () => {
  showIconModal.value = false;
}
const changeIcon = (a) => {
  form.icon = a;
}
const submit = () => {
  // emit('loading', 0);
  form
    .transform((data) => ({
      ...data,
    }))
    .post(route("config.sideMenuStore"), {
      preserveScroll: true,
      onFinish: () => {
        // emit('loading', 1);
      }
    });
};
</script>

<template>
  <CardBox is-form @submit.prevent="submit">
    <h3 class="font-bold">Daftar Menu</h3>
    <FormSection divided>
      <div class="grid grid-cols-1 sm:grid-cols-2">
        <div>
          <InputGroup label="id" name="id" variant="inline" v-show="false">
            <VanillaInput v-model="form.id" name="id" placeholder="id" />
          </InputGroup>
          <InputGroup label="Menu Induk" name="parent" variant="inline">
            <VanillaSelect v-model="form.parent" name="parent" placeholder="Menu Induk" />
          </InputGroup>
          <InputGroup label="Urutan" name="order" variant="inline">
            <VanillaInput v-model="form.order" name="order" placeholder="Urutan" @keyup="form.errors.order = null"
              :errors="form.errors.order" />
          </InputGroup>
          <InputGroup label="Nama" name="name" variant="inline">
            <VanillaInput v-model="form.name" name="name" placeholder="Nama" @keyup="form.errors.name = null"
              :errors="form.errors.name" />
          </InputGroup>
          <InputGroup label="Link" name="link" variant="inline">
            <VanillaInput v-model="form.link" name="link" placeholder="Link" @keyup="form.errors.link = null"
              :errors="form.errors.link" />
          </InputGroup>
          <InputGroup label="Jenis Akun" name="level" variant="inline">
            <VanillaSelect v-model="form.level" name="level" placeholder="Jenis Akun" :options="mRole" />
          </InputGroup>
          <InputGroup label="Aktif" name="active" variant="inline">
            <VanillaSelect v-model="form.active" name="active" placeholder="Aktif" :options="mAktif" />
          </InputGroup>
          <InputGroup label="Icon" name="icon" variant="inline">
            <VanillaInput v-model="form.icon" placeholder="Icon">
              <template #before="{ className }">
                <!-- <a href="https://pictogrammers.com/library/mdi/" target="_blank"> -->
                <svg :class="className" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  stroke-width="1.5" stroke="currentColor" class="w-6 h-6" @click="showIconModal = true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                </svg>
                <!-- </a> -->
              </template>
            </VanillaInput>

          </InputGroup>
        </div>
      </div>
      <div class="text-right me-10">
        <BaseButton label="Simpan >" type="submit" color="info" />
      </div>
    </FormSection>
  </CardBox>
  <CardBoxModal v-model="showIconModal" has-cancel>
    <!-- <MdiIcon v-on:change-icon="changeIcon" v-on:close-modal="closeModal"></MdiIcon> -->
  </CardBoxModal>
</template>
