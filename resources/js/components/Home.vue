<script setup>
import HomeSection from "./HomeSection.vue";
</script>

<template>
    <div class="w-full h-full">
        <section id="home" class="w-full h-full">
            <div class="w-full h-full">
                <div class="flex flex-col justify-center items-center w-full h-full sm:flex-row gap-4">
                    <img src="https://cdn.discordapp.com/attachments/1285510688550162502/1319244926613065773/image.png?ex=67654214&is=6763f094&hm=5d14d107039609e302b4ff85407e4cc8e0a661938ab86189d63a7aa0d117f033&"
                        alt="plaatje van een sigma" class=" coolFisch w-96 h-96 rounded-xl " />
                    <div class="flex flex-col gap-y-4 justify-center">
                        <h1 class="text-4xl font-semibold">
                            Welcome tot Aura-Fixer
                        </h1>
                        <p class="text-base max-w-96">
                            Geef Sigmavile de winterarc die we nodig hebben!
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<style>
.coolFisch {
    -webkit-transform: scaleX(-1);
    transform: scaleX(-1);
}
</style>