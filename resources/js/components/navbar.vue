<template>
  <div class="relative w-full flex-initial">
    <div class="flex w-full px-8">
      <div class="my-4 max-sm:hidden">
        <icon></icon>
      </div>
      <nav ref="root" class="w-full navbar">
        <ul class="flex h-full gap-6 text-xl sm:justify-end max-sm:justify-center nav-links">
          <li v-for="link in links" :key="link" :id="link" :class="{ active: link.toLowerCase() === page }"
            class="cursor-pointer hover:text-logo" @click="setActivePage(link)">
            {{ link }}
          </li>
        </ul>
      </nav>
    </div>
    <hr class="absolute bottom-0 w-full h-px">
  </div>
</template>

<script setup>
import icon from "./icon.vue"

</script>


<script>
export default {
  props: {
    page: "map",
    updatePage: {
      type: Function,
      required: true,
    },
  },
  data() {
    return {
      links: ["Home", "Map", "Beheerder"]
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
