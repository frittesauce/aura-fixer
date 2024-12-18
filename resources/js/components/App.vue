<script setup>
import Navbar from './navbar.vue';
import Home from './Home.vue';
import MapPage from './MapPage.vue';
import { ref } from 'vue'

const props = defineProps(['page'])
let page = ref(props.page)

function updatePage(newPage) {
  page.value = newPage
  history.pushState(
    {},
    null,
    `/${newPage}`
  )
}

</script>

<template>

  <navbar :page="page" :updatePage="updatePage" />

  <main class="overflow-y-auto grow h-60">
      <!-- Shows matching page to the page variable -->
      <home v-if="page == 'home'"></home>
    
      <map-page v-else-if="page == 'map'"></map-page>
    
      <!-- 404 page -->
      <div v-else class="flex items-center justify-center w-full h-screen ">
        <p>404 page not found :(</p>
      </div>
  </main>

</template>