<x-layout>
    @switch($page)
        @case('home')
            <p>home</p>
        @break

        @default
            <p>404 page not found</p>
    @endswitch
</x-layout>
