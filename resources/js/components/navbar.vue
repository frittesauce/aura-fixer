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


<template>
  <nav class="flex justify-center gap-x-4  bg-white">
    <button @click="changePage('home')">
      home
    </button>
    <button @click="changePage('map')">
      map
    </button>
  </nav>
</template>
