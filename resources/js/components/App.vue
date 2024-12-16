<script setup>
import Navbar from './navbar.vue';
import Home from './Home.vue';
import MapPage from './MapPage.vue';

import { ref } from 'vue'

const props = defineProps(['page'])

let page = ref(props.page)

// updates the page var and updates the url
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

  <navbar :page="page" @updatePage="updatePage"></navbar>


  <!-- Shows matching page to the page variable -->
  <home v-if="page == 'home'"></home>

  <map-page v-else-if="page == 'map'"></map-page>

  <!-- 404 page -->
  <div v-else class=" h-screen w-full justify-center flex items-center">
    <p>404 page not found :(</p>
  </div>

</template>