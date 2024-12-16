<script setup>
import { ref } from 'vue'

const counter = ref(0)


</script>

<script>

import navbar from './navbar.vue';
export default {
  name: "navbar",
  components: {
    'navbar': navbar
  }
}
</script>

<template>

  <navbar></navbar>
  <navbar></navbar>
  <navbar></navbar>
  <navbar></navbar>

  <button type="button" @click="counter++" class="p-2 text-white bg-gray-500 rounded">
    Counter is: {{ counter }}
  </button>
</template>