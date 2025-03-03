<script setup>
import AuraMap from '../AuraMap.vue';

import { onMounted, ref } from "vue";

const props = defineProps(["id", "name", "description", "email", "image", "longitude", "latitude"]);

let name = ref(props.name);
let id = ref(props.id)
let description = ref(props.description)
let email = ref(props.email)
let longitude = ref(props.longitude);
let latitude = ref(props.latitude);
let image = ref(props.image);

const marker = ref([
    {
        latitude: latitude.value,
        longitude: longitude.value,
    description: description.value,
    }
])

onMounted(() => {
    let emailElement = document.getElementById("userEmail")
    document.getElementById("userInfo").innerText = `Van ${name.value}, `;
    document.getElementById("reportDesciprtion").innerText = `${description.value}`;
    emailElement.innerText = `${email.value}`;
    emailElement.href = `mailto:${email.value}`
    image = image.value;
});
</script>

<template>
    <div class="w-screen">
        <div
            class="m-16 sm:m-32 border-black order-2 rounded-md p-4 flex sm:flex-row flex-col max-w-[400px] sm:max-w-[800px] gap-2 self-center justify-self-center">
            <div>
                <img :src="`/api/image/${image}`" class=" max-w-64 max-h-64 min-h-64 min-w-64">
            </div>
            <div class=" max-w-[400px]">
                <h1 id="title" class="text-2xl mb-1">klacht</h1>
                <span class="flex gap-2 flex-col sm:flex-row text-lg">
                    <p id="userInfo">van chris bernard </p>
                    <a id="userEmail" href="mailto:loading@gmail.com" class=" text-logo font-semibold">loading@loading.com</a>
                </span>
                <hr class="my-2">
                <p class="text-md" id="reportDesciprtion">deze vis is super kapot aub fix dit snel doet u dit niet zal ik erg boos worden!</p>
            </div>
        </div>
            <AuraMap :markers="marker"></AuraMap>
    </div>
</template>
