<template>
  <div class="flex w-full px-6">
    <div class="my-4">
      <icon></icon>
    </div>
    <nav class="w-full navbar">
      <ul class="h-full text-xl nav-links">
        <li v-for="link in links" :key="link.name" :class="{ active: link.name === currentPage }" class="link"
          @click="setActivePage(link.name)">
          {{ link.name }}
        </li>
      </ul>
    </nav>
  </div>
</template>

<script setup>
import icon from "./icon.vue"
</script>

<script>

export default {
  props: {
    updatePage: {
      type: Function,
      required: true,
    },
  },
  data() {
    return {
      currentPage: "Home",
      links: [
        { name: 'Home' },
        { name: 'Map' },
      ],
    };
  },
  methods: {
    setActivePage(page) {
      this.currentPage = page
      this.$props.updatePage(page.toLowerCase())
    },
  },
};
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
