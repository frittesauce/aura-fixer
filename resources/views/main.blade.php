<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>aura fixer - Give the city a proper winter arc!</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite('resources/js/login.js')

</head>
<body id="app" class="flex flex-col overflow-y-hidden h-dvh">
    <app :page="'{{ $page }}'">
</body>

</html>
