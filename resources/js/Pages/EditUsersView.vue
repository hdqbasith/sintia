<script setup>
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import FormUser from "./Form/FormUser.vue";
import SectionMain from "@/components/SectionMain.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import { Head } from "@inertiajs/vue3";
import { mdiHomeCity } from "@mdi/js";

</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <Head title="Dashboard" />
      <SectionTitleLineWithButton :icon="mdiHomeCity" title="Rumah Gigiku" main>
      </SectionTitleLineWithButton>
      <KeepAlive>
        <FormUser :users="$page.props.users"></FormUser>
      </KeepAlive>
    </SectionMain>
  </LayoutAuthenticated>
</template>
