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
                <img src="/images/betacityvssigmaicty.png" alt="plaatje van een sigma"
                    class="w-80 sm:w-[600px] h-80 sm:h-[600px] rounded-xl sm:rounded-3xl " />
                <div class="flex flex-col gap-y-4 justify-center sm:max-w-none max-w-80">
                    <h1 class="text-4xl sm:text-6xl font-semibold">
                        Welkom tot Aura-Fixer
                    </h1>
                    <p class=" max-w-96 text-2xl">
                        Geef Sigmavile de winterarc die we nodig hebben! <br>
                        post wat er miss is met sigmavile en krijg coole beloningen!

                        <button class=" bg-logo rounded-md p-4 font-bold text-white w-fit self-center text-xl"
                            @click="clickNav('Map')">
                            Ga naar de kaart!
                        </button>
                    </p>
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