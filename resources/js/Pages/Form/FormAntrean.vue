<script setup>
import BaseButton from "@/components/BaseButton.vue";
import CardBox from "@/components/CardBox.vue";
import NotificationBarInCard from "@/components/NotificationBarInCard.vue";
import { router, usePage } from "@inertiajs/vue3";
import { mdiAccountArrowRight, mdiMinusThick, mdiPencil, mdiPlusThick, mdiPrinter } from "@mdi/js";
import { unset } from "lodash";
import { toast } from "vue3-toastify";
import { ref, computed } from "vue";

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
const col = {
  nomor_rm: 'No. RM',
  nama: 'Nama',
  tempat_lahir: 'Tempat Lahir',
  tanggal_lahir: 'Tanggal Lahir',
  nik: 'NIK',
  bpjs: 'No. BPJS',
  gender: 'L/P',
  pekerjaan: 'Pekerjaan',
  alamat: 'Alamat',
  hp: 'No. HP',
  goldar: 'Golongan Darah',
};
const emit = defineEmits(["update:modelValue", "edit"]);
</script>
<template>
  <CardBox>
    <NotificationBarInCard color="info">Antrean Pasien</NotificationBarInCard>
    <div>
      <div class="grid grid-cols-1 sm:grid-cols-2">
        <div class="flex flex-col">
          <div class="grid grid-cols-3 items-start gap-4 content-center" v-for="(c, i) in col">
            <div class="flex justify-start items-center">
              {{ c }}
            </div>
            <div class="col-span-2 mt-0 flex flex-col">
              {{ pasien != null ? pasien[i] : '' }}
            </div>
          </div>
        </div>
        <div>
          <div>
            <BaseButton :icon="mdiPencil" color="" class="bg-yellow-500 me-3" title="Lihat/Edit"
              @click="{emit('edit',true);emit('update:modelValue',false)}" icon-size="50" label="Edit"/>
            <BaseButton :icon="mdiAccountArrowRight" class="" icon-size="50px" color="success" label="Masukkan Antrean"
              @click="router.visit('/antrean/store?pasien=' + pasien.id)" />
            <!-- <BaseButton :icon="mdiPrinter" class="ms-3" icon-size="50px" color="success" label="Cetak Struk" /> -->
          </div>
          <div>
          </div>
        </div>
      </div>
    </div>
  </CardBox>
</template>
