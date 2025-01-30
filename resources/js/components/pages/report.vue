<template>
    <div class="flex justify-center items-center text-white h-full">
        <form onsubmit="event.preventDefault()" class="flex w-1/3 h-4/6 bg-logo box-border p-11 flex-col">
            <h1 class="text-center text-4xl font-[1000]">Een klacht melden</h1>
            <input type="text" v-model="name"
                   class="text-black hover:border-none h-12 p-1 text-xl focus:outline-none focus:outline-offset-4 focus:outline-white input">
            <label>lll</label>
            <input type="email" v-model="email"
                   class="text-black hover:border-none  text-xl p-1 focus:outline-none h-12 focus:outline-offset-4 focus:outline-white input">
            <label>lll</label>
            <textarea type="text" v-model="description"
                      class="text-black hover:border-none  text-xl p-1 focus:outline-none h-64 focus:outline-offset-4 focus:outline-white input"></textarea>
            <button @click="submit">submit</button>
        </form>
    </div>
</template>
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
            let latitude;
            let longitude;
            let name = this.name;
            let email = this.email;
            let description = this.description;
            navigator.geolocation.getCurrentPosition(success, error);
            async function success(position) {
                latitude = position.coords.latitude;
                longitude = position.coords.longitude;

                let data = new FormData();
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
                const text = await response.text()
                try {
                    const json = JSON.parse(text);
                    if (json.error) {
                        alert(json.error);
                        return;
                    }
                } catch {
                }
            }
            function error() {
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        console.log("User denied the request for Geolocation.")
                        break;
                    case error.POSITION_UNAVAILABLE:
                        console.log("Location information is unavailable.")
                        break;
                    case error.TIMEOUT:
                        console.log("The request to get user location timed out.")
                        break;
                    case error.UNKNOWN_ERROR:
                        console.log("An unknown error occurred.")
                        break;
                }
                return;
            }
        },
    }
}
</script>


<style scoped lang="css">


</style>
