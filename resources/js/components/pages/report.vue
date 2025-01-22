<template>
    <div class="flex justify-center items-center text-white h-full">
        <form onsubmit="event.preventDefault()" class="flex w-1/3 h-4/6 bg-logo box-border p-11 flex-col">
            <input type="text" v-model="name"
                   class="text-black hover:border-none h-12 p-1 text-xl focus:outline-none focus:outline-offset-4 focus:outline-white input">
            <label>lll</label>
            <input type="email" v-model="email"
                   class="text-black hover:border-none  text-xl p-1 focus:outline-none h-12 focus:outline-offset-4 focus:outline-white input">
            <label>lll</label>
            <input type="text" v-model="description"
                   class="text-black hover:border-none  text-xl p-1 focus:outline-none h-12 focus:outline-offset-4 focus:outline-white input">
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
            description: '',
            latitude: 0,
            longitude: 0
        }
    },
    methods: {
        async submit() {

            let Location = new Promise((resolve, reject) => {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            resolve({
                                latitude: position.coords.latitude,
                                longitude: position.coords.longitude
                            });
                        },
                        (error) => {
                            reject(error);
                        }
                    );
                } else {
                    reject(new Error("Geolocation is not supported by this browser."));
                }
            });
            Location.then(
                function (value) {
                    this.latitude = value.latitude;
                    this.longitude = value.longitude;
                }
            )

            let data = new FormData();
            data.append("name", this.name);
            data.append("email", this.email);
            data.append("description", this.description);
            data.append("latitude", this.latitude);
            data.append("longitude", this.longitude);
            const response = await fetch("/report", {
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
        },
    }
}
</script>


<style scoped lang="css">


</style>
