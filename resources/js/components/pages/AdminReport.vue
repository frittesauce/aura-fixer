<script setup>
import map from '../MapPage.vue';

import { onMounted, ref } from 'vue';

const props = defineProps(['id', 'name', 'description']);

let name = ref(props.name);


onMounted(() => {
    document.getElementById("name").innerText = name.value
})

</script>

<template>
        <p id="name">skibidi</p>
</template>
