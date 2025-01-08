<script setup>
import action from "../Action.vue"
</script>

<template>
    <div class="relative h-full"
        style="background-size: cover; background-image: url('https://wallpapercave.com/wp/wp2309567.jpg');">
        <div class="flex flex-col w-1/2 h-full gap-4 p-8 bg-white">
            <p class="text-5xl">Inloggen</p>
            <div class="flex flex-col">
                <label>Gebruikersnaam</label>
                <input type="text" class="p-1 bg-red-500">
            </div>
            <div class="flex flex-col">
                <label>Wachtwoord</label>
                <input type="password" class="p-1 bg-red-500">
            </div>
            <action>Aanmelden</action>
        </div>
    </div>
</template>