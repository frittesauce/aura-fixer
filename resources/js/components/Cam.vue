<template>
  <div class="flex relative">
    <div class=" flex relative">
      <div class="camera absolute">
        <video id="video" width="700" height="500">camera is turned of :(</video>
      </div>
      <canvas id="canvas" width="700" height="500"></canvas>
    </div>
    <div class=" flex bottom-0 right-0 left-0 absolute z-50  self-center justify-self-center"><button class=" h-32 w-32"
        id="startbutton"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="lucide lucide-camera">
          <path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z" />
          <circle cx="12" cy="13" r="3" />
        </svg></button>
    </div>
  </div>
</template>

<script setup>
import { onMounted } from 'vue';

onMounted(() => {
  const video = document.getElementById('video');
  const canvas = document.getElementById('canvas');
  const context = canvas.getContext("2d")
  const startbutton = document.getElementById('startbutton');

  let stream = null;
  let streaming = true;

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
    context.drawImage(video, 0, 0, canvas.width, canvas.height);
    video.remove()

    if (stream) {
      stream.getTracks().forEach(track => track.stop());
    }
    ev.preventDefault();
  }, false);


}) 
</script>

<style></style>