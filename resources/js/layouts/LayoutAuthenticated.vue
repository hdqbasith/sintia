<script setup>
import { mdiForwardburger, mdiBackburger, mdiMenu } from "@mdi/js";
import { ref } from "vue";
import menuAside from "@/menuAside.js";
import menuNavBar from "@/menuNavBar.js";
import { useMainStore } from "@/stores/main.js";
import { useStyleStore } from "@/stores/style.js";
import BaseIcon from "@/components/BaseIcon.vue";
import FormControl from "@/components/FormControl.vue";
import NavBar from "@/components/NavBar.vue";
import NavBarItemPlain from "@/components/NavBarItemPlain.vue";
import AsideMenu from "@/components/AsideMenu.vue";
import FooterBar from "@/components/FooterBar.vue";
import { router } from "@inertiajs/vue3";


// router.beforeEach(() => {
//   isAsideMobileExpanded.value = false;
//   isAsideLgActive.value = false;
// });

useMainStore().setUser({
  name: "Huda",
  email: "john@example.com",
  avatar:
    "https://avatars.dicebear.com/api/avataaars/example.svg?options[top][]=shortHair&options[accessoriesChance]=93",
});
router.on("navigate", () => {
  isAsideMobileExpanded.value = false;
  isAsideLgActive.value = false;
});

const layoutAsidePadding = "xl:pl-60";

const styleStore = useStyleStore();

const isAsideMobileExpanded = ref(false);
const isAsideLgActive = ref(false);

const emit = defineEmits(["menu-click"]);

const menuClick = (event, item) => {
  if (item.isToggleLightDark) {
    document.documentElement.classList.remove('dark');
    styleStore.setDarkMode();
    // styleStore.setStyle('basic');
  }

  if (item.isLogout) {
    router.post(route("logout"));
  }
};
</script>

<template>
  <div
    :class="{
      dark: styleStore.darkMode,
      'overflow-hidden lg:overflow-visible': isAsideMobileExpanded,
    }"
  >
    <div
      :class="[layoutAsidePadding, { 'ml-60 lg:ml-0': isAsideMobileExpanded }]"
      class="pt-14 min-h-screen w-screen transition-position lg:w-auto bg-gray-200 dark:bg-slate-800 dark:text-slate-100"
    >
      <NavBar
        :menu="menuNavBar"
        :class="[
          layoutAsidePadding,
          { 'ml-60 lg:ml-0': isAsideMobileExpanded },
        ]"
        @menu-click="menuClick"
      >
        <NavBarItemPlain
          display="flex lg:hidden"
          @click.prevent="isAsideMobileExpanded = !isAsideMobileExpanded"
        >
          <BaseIcon
            :path="isAsideMobileExpanded ? mdiBackburger : mdiForwardburger"
            size="24"
          />
        </NavBarItemPlain>
        <NavBarItemPlain
          display="hidden lg:flex xl:hidden"
          @click.prevent="isAsideLgActive = true"
        >
          <BaseIcon :path="mdiMenu" size="24" />
        </NavBarItemPlain>
        <!-- <NavBarItemPlain use-margin>
          <FormControl
            placeholder="Search (ctrl+K)"
            ctrl-k-focus
            transparent
            borderless
          />
        </NavBarItemPlain> -->
      </NavBar>
      <AsideMenu
        :is-aside-mobile-expanded="isAsideMobileExpanded"
        :is-aside-lg-active="isAsideLgActive"
        :menu="menuAside"
        @menu-click="menuClick"
        @aside-lg-close-click="isAsideLgActive = false"
      />
      <slot />
      <FooterBar>
        Made by
        <a
          href="https://hdqbasith.blogspot.com"
          target="_blank"
          class="text-blue-600"
          >HDQ Basith Studio</a
        >
      </FooterBar>
    </div>
  </div>
</template>
