<template>
    <div class="flex justify-center items-center text-white h-full">
        <img src="https://www.rotterdam.nl/_next/image?url=https%3A%2F%2Fbackend-dvg.rotterdam.nl%2Fsites%2Fdefault%2Ffiles%2Fstyles%2Fhero_large%2Fpublic%2F2022-12%2F22500-Arnoud-Verhey_0.jpg%3Fh%3D940640a5%26itok%3Dl9pnN9Gq&w=3840&q=75" class="absolute bg-contain bg-center w-5/6">
        <form onsubmit="event.preventDefault()" class="flex relative w-1/3 max-sm:w-full max-sm:h-full h-4/6 bg-logo box-border p-11 flex-col overflow-scroll z-10">
            <h1 class="text-center text-4xl font-[1000]">Een klacht melden</h1>
            <Cam></Cam>
            <label>naam</label>
            <input type="text" v-model="name"
                class="text-black hover:border-none h-12 p-1 text-xl focus:outline-none focus:outline-offset-4 focus:outline-white input">
            <label>email</label>
            <input type="email" v-model="email"
                class="text-black hover:border-none  text-xl p-1 focus:outline-none h-12 focus:outline-offset-4 focus:outline-white input">
            <label>omschrijving</label>
            <textarea type="text" v-model="description"
                      class="text-black hover:border-none  text-xl p-1 focus:outline-none h-64 focus:outline-offset-4 focus:outline-white input"></textarea>

            <button @click="submit">submit</button>
        </form>
    </div>
</template>

<script setup>
import Cam from '../Cam.vue';
</script>

<script>


export default {
    data() {
        return {
            name: '',
            email: '',
            description: ''
        }
    },
    methods: {
        async submit() {

            const imageCanvas = document.getElementById("canvas")

            let latitude;
            let longitude;
            let name = this.name;
            let email = this.email;
            let image;
            let description = this.description;
            navigator.geolocation.getCurrentPosition(success, error);
            async function success(position) {
                latitude = position.coords.latitude;
                longitude = position.coords.longitude;

                let data = new FormData();
                imageCanvas.toBlob(async (blob) => {
                    data.append("image", blob);
                    data.append("name", name);
                    data.append("email", email);
                    data.append("description", description);
                    data.append("latitude", latitude);
                    data.append("longitude", longitude);


                    const response = await fetch("/api/report", {
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: data
                    });
                    console.log(data);

                    const text = await response.text()
                    try {
                        const json = JSON.parse(text);
                        if (json.error) {
                            alert(json.error);
                            return;
                        }
                    } catch {
                    }
                });
            }
            function error() {
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        alert("User denied the request for Geolocation.")
                        break;
                    case error.POSITION_UNAVAILABLE:
                        alert("Location information is unavailable.")
                        break;
                    case error.TIMEOUT:
                        alert("The request to get user location timed out.")
                        break;
                    case error.UNKNOWN_ERROR:
                        alert("An unknown error occurred.")
                        break;
                }
            }
        },
    }
}
</script>


<style scoped lang="css"></style>
