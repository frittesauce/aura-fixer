<script setup>
const id = parseInt(window.location.pathname.split("/")[2]);

const response = await fetch(`../api/report/${id}`);
</script>


<template>
  <label>Report</label>
</template>
