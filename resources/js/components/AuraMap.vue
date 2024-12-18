<template>
  <div id="map"></div>
</template>

<script>
import L from 'leaflet';

export default {
  name: 'AuraMap',
  mounted() {
    // Initialize the map when the component is mounted
    const map = L.map('map').setView([51.505, 1], 13); // Initial coordinates [latitude, longitude], zoom level

    // Add OpenStreetMap tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);

    // // Add a marker at the initial location
    L.marker([51.505, -0.09]).addTo(map).bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
      .openPopup();
  }
};
</script>

<style lang="css" scoped>
#map {
  height: 100%;
  width: 100%;
  z-index: 1;
}
</style>