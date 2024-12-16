<script>
export default {
  props: {
    page: {
      type: String,
      Required: true
    }
  },
  methods: {
    changePage(newPage) {
      this.$emit("updatePage", newPage)
    }
  }
}

</script>

<script setup>
import Icon from "./icon.vue"
</script>


<template>
  <div class="flex gap-1 p-4">
    <icon></icon>
    <nav class="top-0 left-0 right-0 z-50 flex justify-center bg-white gap-x-4">
      <button @click="changePage('home')">
        home
      </button>
      <button @click="changePage('map')">
        map
      </button>
    </nav>
  </div>
</template>
