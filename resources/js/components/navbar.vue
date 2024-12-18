<template>
  <div class="relative w-full">
    <div class="flex w-full px-8">
      <div class="my-4 max-sm:hidden">
        <icon></icon>
      </div>
      <nav ref="root" class="w-full navbar">
        <ul class="flex list-none gap-6 h-full text-xl nav-links justify-right max-sm:[justify-center]">
          <li v-for="link in links" :key="link.name" :class="{ active: link.name.toLowerCase() === page }" class="hover:theme(colors.logo)"
            @click="setActivePage(link.name)">
            {{ link.name }}
          </li>
        </ul>
      </nav>
    </div>
    <hr class="absolute bottom-0 w-full h-px bg-red-500">
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
      links: [
        { name: 'Home' },
        { name: 'Map' },
      ],
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
  height: 3px;
  background-color: theme(colors.logo);
}
</style>
