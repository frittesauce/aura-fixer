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
  <nav>
    <button @click="changePage('home')">
      home
    </button>
    <button @click="changePage('map')">
      map
    </button>
  </nav>
</template>