import './bootstrap';

import { createApp } from 'vue';
import App from './components/App.vue';
import AdminReport from './components/pages/AdminReport.vue';


createApp({})
  .component('App', App)
  .component("Report", AdminReport)
  .mount('#app')