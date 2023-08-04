import {
  mdiAccountCircle,
  mdiMonitor,
  mdiGithub,
  mdiLock,
  mdiAlertCircle,
  mdiSquareEditOutline,
  mdiTable,
  mdiViewList,
  mdiTelevisionGuide,
  mdiResponsive,
  mdiPalette,
} from "@mdi/js";

export default [
  {
    route: "pasien.list",
    icon: mdiMonitor,
    label: "Daftar Pasien",
  },
  {
    route: "antrean.list",
    icon: mdiMonitor,
    label: "Daftar Antrean",
  },
  {
    route: "pemeriksaan.list",
    icon: mdiMonitor,
    label: "Pemeriksaan Pasien",
  },
];
