<script setup>
import Navbar from './navbar.vue';
import Home from './Home.vue';
import admin from './pages/Admin.vue'
import login from './pages/Login.vue'

import MapPage from './MapPage.vue';
import { ref } from 'vue'

const props = defineProps(['page', 'authorized']);
let page = ref(props.page);
let authorized = ref(props.authorized);

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

      <map-page v-else-if="page == 'map'"></map-page>
      <admin v-else-if="page == 'beheerder' && authorized == true"></admin>
      <login v-else-if="page == 'beheerder' && authorized != true"></login>

      <!-- 404 page -->
      <div v-else class="flex items-center justify-center w-full h-screen ">
        <p>404 page not found :(</p>
      </div>
    </main>
  </div>
</template>
