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

<style>
.link:hover {
  color: theme(colors.logo)
}

.nav-links {
  display: flex;
  justify-content: right;
  gap: 1.5rem;
  list-style: none;
  padding: 0;
  margin: 0;
}

.nav-links li {
  cursor: pointer;
  padding: 2rem 0;
  position: relative;
}


.nav-links li.active::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 2px;
  background-color: theme(colors.logo);
}
</style>
