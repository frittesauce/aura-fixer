<script setup>
import { ref } from 'vue';

const props = defineProps(['id', 'name', 'description']);

let name = ref(props.name);
console.log(name);

</script>

<template>
  
</template>
