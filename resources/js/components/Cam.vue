<template>
  <button @click="start">testing button</button>
  <div class="camera">
    <video id="video">camera is turned of :(</video>
  </div>
  <div><button id="startbutton">Take photo</button></div>
  <canvas id="canvas"></canvas>
  <div class="output">
    <img id="photo" alt="The screen capture will appear in this box.">
  </div>
</template>

<script setup>
import { onMounted } from 'vue';

onMounted(() => {
  let video = document.getElementById('video');
  let canvas = document.getElementById('canvas');
  let photo = document.getElementById('photo');
  let startbutton = document.getElementById('startbutton');

  navigator.mediaDevices.getUserMedia({
    video: true,
    audio: false
  })
    .then(function (stream) {
      video.srcObject = stream;
      video.play();
    })
    .catch(function (err) {
      console.log("An error occurred: " + err);
    });

  video.addEventListener('canplay', function (ev) {
    if (!streaming) {
      height = video.videoHeight / (video.videoWidth / width);

      if (isNaN(height)) {
        height = width / (4 / 3);
      }

      video.setAttribute('width', width);
      video.setAttribute('height', height);
      canvas.setAttribute('width', width);
      canvas.setAttribute('height', height);
      streaming = true;
    }
  }, false);

  startbutton.addEventListener('click', function (ev) {
    takepicture();
    ev.preventDefault();
  }, false);

}) 
</script>

<style></style>