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

  <navbar :page="page" @updatePage="updatePage"></navbar>

  <home v-if="page == 'home'"></home>
  <map-page v-else-if="page == 'map'"></map-page>
  <div v-else class=" h-screen w-full justify-center flex items-center">
    <p>404 page not found :(</p>
  </div>

</template>