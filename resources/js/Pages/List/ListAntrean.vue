<script setup>
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SectionMain from "@/components/SectionMain.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import { Head, router, usePage } from "@inertiajs/vue3";
import { mdiAccountHeart, mdiArrowRightBold, mdiBullhorn, mdiDeleteEmpty, mdiEye, mdiMenuDown, mdiMenuUp, mdiPlusThick, mdiSkipNext } from "@mdi/js";
import CardBox from '@/components/CardBox.vue';
import { reactive, ref, computed } from "vue";
import BaseButton from "@/components/BaseButton.vue";
import { VanillaInput } from "@flavorly/vanilla-components";
import CardBoxModalEmpty from "@/components/CardBoxModalEmpty.vue";
import { split, toArray, toLower } from "lodash";
import BaseIcon from "@/components/BaseIcon.vue";

const antreans = usePage().props.antreans;
const filteredAntreans = ref(antreans);
const filterAntrean = (search) => {
  filteredAntreans.value = toArray(antreans).filter((dataArray) =>
    Object.values(dataArray).some(value =>
      toLower(value).indexOf(toLower(search)) > -1
    )
  )
};
const filterMenunggu = () => {
  filteredAntreans.value = toArray(antreans).filter((col) => {
    if (col.kehadiran == 'D') return true;
  })
};
filterMenunggu();
const mapped = ref();
const asc = ref({ col: '', asc: true });
const sortantrean = (col) => {
  if (asc.value.col != col) {
    asc.value.col = col;
    asc.value.asc = true;
  } else {
    asc.value.asc = !asc.value.asc;
  }
  mapped.value = filteredAntreans.value.map((v, i) => {
    return { i, value: v[col] };
  });
  mapped.value.sort((a, b) => {
    if (asc.value.asc == true) {
      if (a.value > b.value) {
        return 1;
      }
      if (a.value < b.value) {
        return -1;
      }
    } else {
      if (a.value > b.value) {
        return -1;
      }
      if (a.value < b.value) {
        return 1;
      }
    }
    return 0;
  });
  filteredAntreans.value = mapped.value.map((v) => filteredAntreans.value[v.i])
}
const tabs = reactive({
  tabAntrean: true,
  tabSemua: false,
});
const tabAktif = (i) => {
  Object.keys(tabs).forEach(t => {
    tabs[t] = false;
  });
  tabs[i] = true;
  if (i == 'tabAntrean') filterMenunggu();
  else if (i == 'tabSemua') filterAntrean('');
}
const antrean = ref();
const showFormantrean = ref(false);
const newantrean = () => {
  showFormantrean.value = true;
  antrean.value = 'reset';
};
const searchInput = ref();
const thead = reactive({
  nomor: 'No. Antrean',
  pasien: 'Nama Pasien',
  alamat: 'Alamat',
  kehadiran: 'Status',
  aksi: '',
});
const status = { D: 'menunggu', P: 'sudah dipanggil', T: 'ditunda', S: 'selesai' };
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <Head title="Daftar Antrean" />
      <SectionTitleLineWithButton :icon="mdiAccountHeart" title="Daftar antrean">
        <BaseButton :icon="mdiPlusThick" label="Antrean Baru" color="info" rounded-full small @click="router.visit('/pasien/list')" />
      </SectionTitleLineWithButton>
      <CardBox>
        <div class="mb-3">
          Pasien yang sedang ditangani: <span class="font-bold me-4">{{ filteredAntreans[0]['daftar_pasien']['nama'] }} (no. {{ filteredAntreans[0]['nomor'] }})</span>
          <BaseButton :icon="mdiSkipNext" label="Panggil berikutnya" color="info"/>
        </div>
        <div class="mb-3">
          <BaseButton v-for="(t, i) in tabs" :label="i.toString().replace('tab', '')" :key="i" class="me-1 mb-3"
            :class="tabs[i] ? '' : 'text-xs'" @click="tabAktif(i)" :color="tabs[i] ? 'success' : 'info'" />
        </div>

        <VanillaInput v-model="searchInput" name="nomor_rm" placeholder="Cari" @input="filterAntrean(searchInput)" />
        <table>
          <thead>
            <tr>
              <th v-for="(h, i) in thead" @click="sortantrean(i)">
                <BaseIcon :path="asc.asc == true ? mdiMenuUp : mdiMenuDown" v-show="asc.col == i"></BaseIcon>{{ h
                }}
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="p in filteredAntreans">
              <td data-label="No. Antrean">{{ p.nomor }}</td>
              <td data-label="Nama Pasien">{{ p.daftar_pasien.nama }}</td>
              <td data-label="Alamat">{{ p.daftar_pasien.alamat }}</td>
              <td data-label="Status">{{ status[p.kehadiran] }}</td>
              <td class="text-center">
                <BaseButton :icon="mdiBullhorn" color="" class="bg-yellow-200 text-black" title="Panggil" icon-size="24"
                  @click="{ antrean = p; showFormantrean = true }" />
                <BaseButton :icon="mdiDeleteEmpty" class="ml-4" color="danger" title="Hapus" :icon-size="24"/>
              </td>
            </tr>
          </tbody>
        </table>
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>
