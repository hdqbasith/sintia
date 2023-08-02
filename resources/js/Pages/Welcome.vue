<script setup>
import { Head, Link } from '@inertiajs/vue3';
import JustboilLogo from "@/components/JustboilLogo.vue";

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String,
});
const year = new Date().getFullYear();
</script>

<template>
  <Head title="Selamat Datang" />

  <div class="relative sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-300 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white       .gradient {
        gradient">
    <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
      <Link v-if="$page.props.auth.user" :href="route('dashboard')"
        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
      Dashboard</Link>

      <template v-else>
        <button class="transform transition hover:scale-105 duration-300 ease-in-out">
          <Link :href="route('login')"
            class="dark:text-gray-400 dark:hover:text-white hover:bg-yellow-300 focus:bg-yellow-300 rounded-full py-4 px-8 text-black font-bold">
          Log in
          </Link>
        </button>

        <!-- <button class="transform transition hover:scale-105 duration-300 ease-in-out">
          <Link v-if="canRegister" :href="route('register')"
            class="dark:text-gray-400 dark:hover:text-white hover:bg-yellow-300 focus:bg-yellow-300 bg-white font-bold rounded-full py-4 px-8">
          Daftar
          </Link>
        </button> -->
      </template>
    </div>

    <div class="sm:mt-0 -mt-16 ">
      <div class="sm:ml-6 ml-3 mb-6">
        <div>
          <JustboilLogo class="w-auto h-6 fill-orange-700 ml-8" />
        </div>
        <p class="-mt-2 text-orange-700 text-xs [text-shadow:_2px_2px_7px_rgb(0_0_0_/_30%)]">
          Saatnya kebaikan terstruktur rapi</p>
      </div>
      <div class="">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
          <!--Left Col-->
          <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
            <p class="uppercase tracking-loose w-full">Gigi Sehat dan Kuat</p>
            <h1 class="text-5xl font-bold leading-tight">
              Rumah Gigiku
            </h1>
            <p class="leading-normal text-2xl mb-8">
              Ayo periksa kesehatan gigimu bersama drg. Dyaswara Tituk Ajeng Widyaningrum
            </p>
            <button
              class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
              Selengkapnya
            </button>
          </div>
          <!--Right Col-->
          <div class="w-full md:w-3/5 text-right">
            <img class="w-full z-50" src="image/gedung timur.png" />
          </div>
        </div>
      </div>

      <div class="relative -mt-12 lg:-mt-24">
        <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink">
          <g stroke="none" stroke-width="1" fill="" fill-rule="evenodd">
            <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
              <path
                d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                opacity="0.100000001"></path>
              <path
                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                opacity="0.100000001"></path>
              <path
                d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                id="Path-4" opacity="0.200000003"></path>
            </g>
            <defs>
              <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" style="stop-color:#54fff1cc;stop-opacity:1" />
                <stop offset="100%" style="stop-color: #00c4ba;stop-opacity:1" />
              </linearGradient>
            </defs>
            <g transform="translate(-4.000000, 76.000000)" fill="url(#grad1)" fill-rule="nonzero">
              <path
                d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
              </path>
            </g>
          </g>
        </svg>
      </div>
      <div class="p-8 gradient2">
        <h2 class="w-full my-2 text-4xl font-bold leading-tight text-center text-white">
          Rumah Gigiku
        </h2>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <h4 class="text-white text-center mb-16 text-xl">
          Klinik gigi dengan fasilitas yang lengkap di Desa Pedawang, Kudus.
          Nikmati pelayanan kesehatan gigi dan mulut terbaik hanya di Rumah Gigiku.
        </h4>

        <h2 class="w-full my-2 text-4xl font-bold leading-tight text-center text-white">
          Kelebihan Rumah Gigiku
        </h2>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
          <a href="https://idary.gusjigang.id"
            class="scale-100 p-6 bg-slate-300 dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
            <div>
              <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  class="w-7 h-7 stroke-red-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
              </div>

              <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Dokter Profesional</h2>

              <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                Percayakan kesehatan gigi dan mulut Anda hanya kepada ahlinya
              </p>
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
            </svg>
          </a>

          <a href="https://idary.gusjigang.id"
            class="scale-100 p-6 bg-slate-300 dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
            <div>
              <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  class="w-7 h-7 stroke-red-500">
                  <path stroke-linecap="round"
                    d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                </svg>
              </div>

              <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Fasilitas Lengkap</h2>

              <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                Jangan khawatir harus pindah-pindah klinik hanya karena tidak adanya fasilitas yang memadai.
              </p>
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
            </svg>
          </a>

          <a href="https://idary.gusjigang.id"
            class="scale-100 p-6 bg-slate-300 dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
            <div>
              <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  class="w-7 h-7 stroke-red-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                </svg>
              </div>

              <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Pelayanan Ramah
              </h2>

              <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                Sehat berawal dari perasaan damai dalam hati. Izinkan kami untuk turut membuat hati Anda damai.
              </p>
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
            </svg>
          </a>

          <div
            class="scale-100 p-6 bg-slate-300 dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
            <div>
              <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  class="w-7 h-7 stroke-red-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" />
                </svg>
              </div>

              <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Tarif Terjangkau</h2>

              <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                Sehat tak harus mahal. Kualitas pelayanan terbaik bisa diperoleh dengan tarif yang ramah di kantong.
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
        <div class="text-center text-sm text-slate-950 dark:text-gray-400 sm:text-left">
          <div class="flex items-center gap-4">
            <a href="https://github.com/sponsors/taylorotwell"
              class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
              &copy; {{ year }} | HDQ Basith Studio
            </a>
          </div>
        </div>

        <!-- <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </div> -->
      </div>
    </div>
  </div>
</template>

<style>
.bg-dots-darker {
  background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
  .dark\:bg-dots-lighter {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
  }
}

.gradient {
  background: linear-gradient(90deg, #03009bcc 0%, #002d4b 100%);
}

.gradient2 {
  background: linear-gradient(90deg, #00095acc 0%, #00013a 100%);
}
</style>
