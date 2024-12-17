<script setup>
import { onMounted } from 'vue';


async function takePicture(event) {

  let mediaDevices = navigator.mediaDevices;
  let video = document.getElementById("vid");
  vid.muted = true;

  mediaDevices
    .getUserMedia({
      video: true,
      audio: true,
    })
    .then((stream) => {
      // Changing the source of video to current stream.
      video.srcObject = stream;
      video.addEventListener("loadedmetadata", () => {
        video.play();
      });
    })
    .catch(alert);

}
</script>

<template>
  <p>test</p>
  <input type="file" accept="image/*" capture="camera">

  <div>
    <video id="vid"></video>
  </div>
</template>