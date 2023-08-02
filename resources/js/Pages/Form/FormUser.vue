<script setup>
import {
  FormSection,
  InputGroup,
  Input as VanillaInput,
  Select as VanillaSelect,
} from '@flavorly/vanilla-components';
import { reactive, ref, watch } from "vue";
import { useForm } from '@inertiajs/vue3';
import BaseButton from '@/components/BaseButton.vue';
import CardBox from '@/components/CardBox.vue';
import { toast } from 'vue3-toastify';
import { mdiPlus, mdiTrashCan } from '@mdi/js';

const props = defineProps({ users: Object });
const users = {};
const mUsers = {};
props.users.forEach(user => {
  mUsers[user.id] = user.name;
  users[user.id] = user;
});
const form = useForm({
  id: '',
  name: '',
  email: '',
  password: '',
  role: ''
});
watch(() => form.id, (id) => {
  if (id) {
    form.id = users[id].id;
    form.name = users[id].name;
    form.email = users[id].email;
    form.role = users[id].roles[0] ? users[id].roles[0].name : '';
  }
});
const mRole = ['admin', 'dokter', 'perawat', 'kasir', 'pasien'];
const newUser = ref(false);
const submit = () => {
  // emit('loading', 0);
  form
    .transform((data) => ({
      ...data,
    }))
    .post(route("user.store"), {
      preserveScroll: true,
      onFinish: () => {
        toast.success('ok');
        form.reset('password');
        // emit('loading', 1);
      }
    });
};
</script>

<template>
  <CardBox is-form @submit.prevent="submit" class="max-w-md">
    <div class="grid grid-cols-2">
      <h3 class="font-bold">Data User</h3>
      <div class="text-right">
        <BaseButton class="px-6" :icon="mdiPlus" color="success" @click="{ newUser = true; form.reset() }" v-show="!newUser" />
        <BaseButton class="px-6 ms-2" :icon="mdiTrashCan" color="danger" @click="toast.error('Mohon maaf, belum bisa hapus data')" v-show="form.id" />
      </div>
    </div>
    <FormSection divided autocomplete="off">
      <InputGroup label="Nama" name="name" variant="inline">
        <VanillaInput v-model="form.name" name="name" placeholder="Nama" @keyup="form.errors.name = null"
          :errors="form.errors.name" v-show="newUser" />
        <VanillaSelect v-model="form.id" name="id" placeholder="Akun" :options="mUsers" v-show="!newUser" />
      </InputGroup>
      <InputGroup label="Email" name="email" variant="inline">
        <VanillaInput v-model="form.email" name="email" placeholder="Email" @keyup="form.errors.email = null"
          :errors="form.errors.email" autocomplete="new-email" />
      </InputGroup>
      <InputGroup label="Password" name="password" variant="inline" v-if="newUser" key="pass">
        <VanillaInput v-model="form.password" name="password" placeholder="Password" @keyup="form.errors.password = null"
          :errors="form.errors.password" type="password" autocomplete="new-password" />
      </InputGroup>
      <InputGroup label="Jenis Akun" name="role" variant="inline">
        <VanillaSelect v-model="form.role" name="role" placeholder="Jenis Akun" :options="mRole" :errors="form.errors.role"/>
      </InputGroup>
      <div class="text-right me-10">
        <BaseButton label="Cancel" color="danger" class="me-2 mt-3" v-show="newUser" @click="newUser = false" />
        <BaseButton label="Simpan >" type="submit" color="info" :disabled="!form.isDirty" />
      </div>
    </FormSection>
  </CardBox>
</template>