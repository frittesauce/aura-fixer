<template>
  <div class="relative flex-initial w-full bg-white">
    <div class="flex w-full px-8">
      <div class="my-4 max-sm:hidden">
        <icon></icon>
      </div>
      <nav ref="root" class="w-full navbar">
        <ul class="flex h-full gap-6 text-xl sm:justify-end max-sm:justify-center nav-links">
          <li v-for="page in pages" :key="page" :class="{ active: page.toLowerCase() === currentPage }"
            @click="setActivePage(page)">
            <anchor>
            {{ page }}
            </anchor>
          </li>
        </ul>
      </nav>
    </div>
    <hr class="absolute bottom-0 w-full h-px">
  </div>
</template>

<script setup>
import icon from "./Icon.vue"
import anchor from "./Anchor.vue"
</script>


<script>
export default {
  props: {
    currentPage: "",
    updatePage: {
      type: Function,
      required: true,
    },
  },
  data() {
    return {
      pages: ["Home", "Map", "Beheerder"]
    };
  },
  methods: {
    setActivePage(page) {
      this.$props.updatePage(page.toLowerCase())
    },
  },
};
</script>

<style>
.nav-links li {
  padding: 2rem 0;
  position: relative;
}

.nav-links li.active::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 3px;
  background-color: theme(colors.logo);
}
</style>
