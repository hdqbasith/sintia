<script setup>
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SectionMain from "@/components/SectionMain.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import { Head, router, usePage } from "@inertiajs/vue3";
import { mdiAccountHeart, mdiAccountMultiplePlus, mdiArrowRightBold, mdiArrowRightBoldBox, mdiArrowRightBox, mdiEye, mdiHumanQueue, mdiMenuDown, mdiMenuUp, mdiPencil, mdiPlusThick } from "@mdi/js";
import CardBox from '@/components/CardBox.vue';
import { reactive, ref, computed } from "vue";
import BaseButton from "@/components/BaseButton.vue";
import { VanillaInput } from "@flavorly/vanilla-components";
import FormPasien from "../Form/FormPasien.vue";
import CardBoxModalEmpty from "@/components/CardBoxModalEmpty.vue";
import { split, toArray, toLower } from "lodash";
import BaseIcon from "@/components/BaseIcon.vue";
import FormAntrean from "../Form/FormAntrean.vue";
import BaseLevel from "@/components/BaseLevel.vue";
import BaseButtons from "@/components/BaseButtons.vue";
import mapSort from "mapsort";

const pasiens = usePage().props.pasiens;
const filteredpasiens = ref(pasiens);
const filterPasien = (search) => {
  filteredpasiens.value = toArray(pasiens).filter((dataArray) =>
    Object.values(dataArray).some(value =>
      toLower(value).indexOf(toLower(search)) > -1
    )
  )
};
const filterBpjs = (bool) => {
  filteredpasiens.value = toArray(pasiens).filter((col) => {
    if (col.bpjs != null && bool == 'bpjs') return true;
    else if (col.bpjs == null && bool == 'non') return true;
    // else return false;
  }
  )
};
const mapped = ref();
const asc = ref({ col: '', asc: true });
const sortPasien = (col) => {
  if (asc.value.col != col) {
    asc.value.col = col;
    asc.value.asc = true;
  } else {
    asc.value.asc = !asc.value.asc;
  }
  mapped.value = filteredpasiens.value.map((v, i) => {
    return { i, value: v[col] };
  });
  // mapped.value.sort((a, b) => {
  //   if (asc.value.asc == true) {
  //     if (a.value > b.value) {
  //       return 1;
  //     }
  //     if (a.value < b.value) {
  //       return -1;
  //     }
  //   } else {
  //     if (a.value > b.value) {
  //       return -1;
  //     }
  //     if (a.value < b.value) {
  //       return 1;
  //     }
  //   }
  //   return 0;
  // });
  mapped.value = mapSort(
    mapped.value,
    (p, i) => ({ value: p.value }),
    (a, b) => {
      if (col == 'nomor_rm') {
        if (asc.value.asc == true) {
          return a.value - b.value;
        } else {
          return b.value - a.value;
        }
      }
      else if (asc.value.asc == true) {
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
    }
  )
  filteredpasiens.value = mapped.value.map((v) => filteredpasiens.value[v.i])
}
const currentPage = ref(0);
const pasienPaginated = computed(() =>
  filteredpasiens.value.slice(
    25 * currentPage.value,
    25 * (currentPage.value + 1)
  )
);
const numPages = computed(() => Math.ceil(filteredpasiens.value.length / 25));
const currentPageHuman = computed(() => currentPage.value + 1);
const pagesList = computed(() => {
  const pagesList = [];

  for (let i = 0; i < numPages.value; i++) {
    pagesList.push(i);
  }

  return pagesList;
});




const tabs = reactive({
  tabSemua: true,
  tabBPJS: false,
  tabUmum: false,
});
const tabAktif = (i) => {
  Object.keys(tabs).forEach(t => {
    tabs[t] = false;
  });
  tabs[i] = true;
  if (i == 'tabBPJS') filterBpjs('bpjs');
  else if (i == 'tabSemua') filterPasien('');
  else if (i == 'tabUmum') filterBpjs('non');
}
const pasien = ref();
const showFormPasien = ref(false);
const showFormAntrean = ref(false);
const newPasien = () => {
  showFormPasien.value = true;
  pasien.value = 'reset';
};
const searchInput = ref();
const thead = reactive({
  nomor_rm: 'No. RM',
  nama: 'Nama',
  ttl: 'TTL',
  nik: 'NIK',
  bpjs: 'No. BPJS',
  pekerjaan: 'Pekerjaan',
  alamat: 'Alamat',
  aksi: '',
});
const edit = () => {
  showFormPasien.value = true;
}
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>

      <Head title="Daftar Pasien" />
      <SectionTitleLineWithButton :icon="mdiAccountHeart" title="Daftar Pasien">
        <div class="text-right">
          <BaseButton :icon="mdiHumanQueue" label="Antrean" color="success" rounded-full small
            @click="router.visit('/antrean/list')" class="me-2 mb-2" />
          <BaseButton :icon="mdiPlusThick" label="Pasien Baru" color="info" rounded-full small @click="newPasien" />
        </div>
      </SectionTitleLineWithButton>
      <CardBox>
        <div class="mb-3">
          <BaseButton v-for="(t, i) in tabs" :label="i.toString().replace('tab', '')" :key="i" class="me-1 mb-3"
            :class="tabs[i] ? '' : 'text-xs'" @click="tabAktif(i)" :color="tabs[i] ? 'success' : 'info'" />
        </div>

        <VanillaInput v-model="searchInput" name="nomor_rm" placeholder="Cari" @input="filterPasien(searchInput)" />
        <table>
          <thead>
            <tr>
              <th v-for="(h, i) in thead" @click="sortPasien(i)" class="cursor-pointer">
                <BaseIcon :path="asc.asc == true ? mdiMenuUp : mdiMenuDown" v-show="asc.col == i"></BaseIcon>{{ h }}
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="p in pasienPaginated">
              <td data-label="No. RM">{{ p.nomor_rm }}</td>
              <td data-label="Nama">{{ p.nama }}</td>
              <td data-label="TTL">{{ p.tempat_lahir ? p.tempat_lahir + ', ' : p.tempat_lahir }}{{ p.tanggal_lahir ?
                p.tanggal_lahir.split('-').reverse().join('-') : '' }}</td>
              <td data-label="NIK">{{ p.nik }}</td>
              <td data-label="No. BPJS">{{ p.bpjs }}</td>
              <td data-label="Pekerjaan">{{ p.pekerjaan }}</td>
              <td data-label="Alamat">{{ p.alamat }}</td>
              <td class="text-center">
                <div>
                  <BaseButton :icon="mdiArrowRightBold" class="ml-1" color="info" title="Masukkan Antrean"
                    @click="{ pasien = p; showFormAntrean = true }" icon-size="24" />
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="p-3 lg:px-6 border-t border-gray-100 dark:border-slate-800">
          <BaseLevel>
            <BaseButtons>
              <BaseButton v-for="page in pagesList" :key="page" :active="page === currentPage" :label="page + 1"
                :color="page === currentPage ? 'lightDark' : 'whiteDark'" small @click="currentPage = page" />
            </BaseButtons>
            <small>Page {{ currentPageHuman }} of {{ numPages }}</small>
          </BaseLevel>
        </div>
      </CardBox>
      <CardBoxModalEmpty v-model="showFormPasien">
        <FormPasien :pasien="pasien" v-model="showFormPasien" />
      </CardBoxModalEmpty>
      <CardBoxModalEmpty v-model="showFormAntrean">
        <FormAntrean :pasien="pasien" v-model="showFormAntrean" @edit="edit" />
      </CardBoxModalEmpty>
    </SectionMain>
  </LayoutAuthenticated>
</template>
