<script setup>
import Navbar from './navbar.vue';
import Home from './Home.vue';
import admin from './pages/Admin.vue'
import adminReport from './pages/AdminReport.vue'
import login from './pages/Login.vue'
import report from './pages/report.vue'

import MapPage from './MapPage.vue';
import { ref } from 'vue'

const props = defineProps(['page', 'authorized']);
let page = ref(props.page);
let authorized = ref(props.authorized == true);

if (authorized.value) {
  setInterval(async () => {
      const response = await fetch("../api/extend-token");
      if (response.status !== 200) {
          window.location.reload();
      }
  }, 30 * 1000);
}

function updatePage(newPage) {
  page.value = newPage;
  history.pushState(
    {},
    null,
    `/${newPage}`
  );
}

</script>

<template>
  <div class="flex w-screen h-screen sm:flex-col max-sm:flex-col-reverse">
    <navbar :currentPage="page" :updatePage="updatePage" />

    <main class="flex-auto overflow-y-auto">

      <!-- Shows matching page to the page variable -->
      <home v-if="page == 'home'"></home>

      <report v-else-if="page == 'melden'"></report>
      <map-page v-else-if="page == 'map'"></map-page>
      <adminReport v-else-if="page == 'report'"></adminReport>
      
      <admin v-else-if="page == 'beheerder' && authorized == true"></admin>
      <login v-else-if="page == 'beheerder' && authorized != true"></login>

      <!-- 404 page -->
      <div v-else class="flex flex-col items-center justify-center w-full h-screen ">
        <img src="/images/fish.png" alt="image of a cool fish" class="w-80 h80">
        <p>404 page not found :(</p>
      </div>
    </main>
  </div>
</template>
