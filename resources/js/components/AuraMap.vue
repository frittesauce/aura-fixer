<template>
  <div class="flex justify-center ">
    <div id="map"></div>
  </div>
</template>

<script>

let cords = ["0", "0"]

function success(pos) {
  cords = pos.coords;

}

function error(err) {
  console.warn(`ERROR(${err.code}): ${err.message}`);
}

import L from 'leaflet';

export default {
  name: 'AuraMap',
  mounted() {

    navigator.geolocation.getCurrentPosition(success, error)

    // Initialize the map when the component is mounted
    const map = L.map('map').setView(cords, 20); // Initial coordinates [latitude, longitude], zoom level

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