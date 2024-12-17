<template>
  <div class="flex justify-center ">
    <div id="map"></div>
  </div>
</template>

<script>

import L from 'leaflet';

export default {
  name: 'AuraMap',
  mounted() {

    let cords = ["51.93", "4.48"]


    // Initialize the map when the component is mounted
    const map = L.map('map').setView(cords, 12); // Initial coordinates [latitude, longitude], zoom level

    // Add OpenStreetMap tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> rizzer',
    }).addTo(map);


  }
};
</script>

<style lang="css" scoped>
#map {
  height: 95dvh;
  width: 99dvw;
}
</style>