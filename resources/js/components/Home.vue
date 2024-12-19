<script setup>
function clickNav(page) {
    let nav = document.getElementById(page)
    nav.click()
}
</script>

<template>
    <div class="w-full h-full">
        <div class="w-full h-full">
            <div class="flex flex-col justify-center items-center w-full h-full sm:flex-row gap-4">
                <img src="https://cdn.discordapp.com/attachments/1285510688550162502/1319244926613065773/image.png?ex=67654214&is=6763f094&hm=5d14d107039609e302b4ff85407e4cc8e0a661938ab86189d63a7aa0d117f033&"
                    alt="plaatje van een sigma" class=" coolFisch w-80 h-80 rounded-xl " />
                <div class="flex flex-col gap-y-4 justify-center sm:max-w-none max-w-80">
                    <h1 class="text-4xl font-semibold">
                        Welcome tot Aura-Fixer
                    </h1>
                    <p class="text-base max-w-96 text-md font-semibold">
                        Geef Sigmavile de winterarc die we nodig hebben! <br>
                        post wat er miss is met sigmavile en krijg coole beloningen!
                        <span class=" text-sm text-gray-400">(beloningen zijn niet gegarandeerd)</span>
                    </p>
                    <button class=" bg-logo rounded-md p-4 font-bold text-white w-fit self-center text-xl"
                        @click="clickNav('Map')">
                        Ga naar de kaart!
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.coolFisch {
    -webkit-transform: scaleX(-1);
    transform: scaleX(-1);
}
</style>