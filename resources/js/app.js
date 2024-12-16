import './bootstrap';

import { createApp } from 'vue';
import App from './components/App.vue';

createApp({})
  .component('App', App)
  .mount('#app')