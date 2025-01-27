<script setup></script>

<template>
    <div class="relative h-full bg-cover" style="
            background-image: url(&quot;https://wallpapercave.com/wp/wp2309567.jpg&quot;);
        ">
        <form id="login" class="flex flex-col w-1/2 h-full gap-4 p-8 bg-white max-sm:w-full">
            <p class="text-5xl">Inloggen</p>
            <div class="flex flex-col">
                <label>Gebruikersnaam</label>
                <input id="username" type="text" placeholder="Gebruikersnaam"
                    class="h-12 p-1 text-xl text-black hover:border-none focus:outline-none focus:outline-offset-4 focus:outline-white" />
            </div>
            <div class="flex flex-col">
                <label>Wachtwoord</label>
                <input id="password" type="password" placeholder="Wachtwoord"
                    class="h-12 p-1 text-xl text-black hover:border-none focus:outline-none focus:outline-offset-4 focus:outline-white" />
            </div>
            <button class="p-2 text-base font-bold text-white bg-button hover:bg-button-hover">
                Aanmelden
            </button>
        </form>
    </div>
</template>