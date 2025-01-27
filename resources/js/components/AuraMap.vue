<template>
  <div id="map"></div>
</template>

<script>
import L from 'leaflet';

export default {
  name: 'AuraMap',
  async mounted() {
      // Initialize the map when the component is mounted
      const map = L.map('map').setView([51.9280, 4.4908], 11); // Initial coordinates [latitude, longitude], zoom level

      // Add OpenStreetMap tile layer
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      }).addTo(map);


      let response = await fetch("/report", {
          method: "GET"
      });
      let json = await response.json();
      if (json.error) {
          alert(json.error);
          return;
      }
      console.log(json);
      for (let i = 0; i< json.length; i++) {
          console.log(json[i].latitude);
          L.marker([json[i].latitude, json[i].longitude]).addTo(map).bindPopup(json[i].description)
      }
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
