import "../css/main.css";

import { createPinia } from "pinia";
import { useStyleStore } from "@/stores/style.js";
import { darkModeKey } from "@/config.js";
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import { VanillaComponents } from '@flavorly/vanilla-components';
import Vue3Toasity from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import 'v-calendar/style.css';
import LayoutGuest from "@/layouts/LayoutGuest.vue";
const appName =
  window.document.getElementsByTagName("title")[0]?.innerText || "Sintia";


const pinia = createPinia();
const styleStore = useStyleStore(pinia);
styleStore.setStyle('basic');
/* Dark mode */
if (
  (!localStorage[darkModeKey] &&
    window.matchMedia("(prefers-color-scheme: dark)").matches) ||
  localStorage[darkModeKey] === "1"
) {
  styleStore.setDarkMode(true);
}


createInertiaApp({

  title: (title) => `${title} - ${appName}`,
  resolve: async (name) => {
    const page = (
      await resolvePageComponent(
        `./Pages/${name}.vue`,
        import.meta.glob('./Pages/**/*.vue'),
      )
    ).default;

    if (page.layout === undefined) {
      page.layout = LayoutGuest;
    }

    return page;
  },
  setup({ el, App, props, plugin }) {
    return createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(pinia)
      .use(ZiggyVue, Ziggy)
      .use(VanillaComponents)
      .use(Vue3Toasity)
      .mount(el);
  },
  progress: {
    color: "red",
  },
});

// document.documentElement.classList.remove('dark');