<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>aura fixer - Give the city a proper winter arc!</title>

    @vite('resources/css/app.css')

</head>

<script>
    let page = "{{ $page }}"

    function flushPage() {
        switch (page) {
            case 'home':
                content.innerHTML = '<p>test</p>';
                break;
            case 'map':
                content.innerHTML = '<p>map page</p>';
                break;
            default:
                content.innerHTML = '<p>404 page not found</p>';
                break;
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        flushPage()
    });


    function changePage(new_page) {
        page = new_page;

        history.pushState({}, null, new_page)

        flushPage()
    }
</script>

<body>
    <div class="flex justify-between h-24 items-center px-14 ">
        <a>
            <img src="images/logo.svg" alt="logo gemeente rizz, naar home pagina" loading="lazy" width="240"
                height="48" decoding="async">
        </a>

        <nav class="flex">
            <ul class="flex gap-x-4">
                <li>
                    <button onclick="changePage('home')"
                        class=" leading-7 inline-flex items-center border-0 text-black hover:text-logo text-lg h-full">
                        home
                    </button>
                </li>
                <li>
                    <button onclick="changePage('map')"
                        class=" leading-7 inline-flex items-center border-0 text-black hover:text-logo text-lg h-full">
                        map
                    </button>
                </li>
            </ul>
        </nav>

    </div>

    <main id="content">

    </main>

</body>

</html>
