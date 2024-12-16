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
  <nav class=" absolute top-0 right-0 left-0 flex justify-center gap-x-4 z-50 bg-white">
    <button @click="changePage('home')">
      home
    </button>
    <button @click="changePage('map')">
      map
    </button>
  </nav>
</template>
