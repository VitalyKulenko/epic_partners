<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="m-4">
        <form class="flex">
            @csrf
            <button x-data="{ isActive: localStorage.getItem('isActive_Бесплатные') === 'true' }" x-bind:class="{ 'bg-green-600 text-white': isActive, 'bg-green-200': !isActive }" x-on:click="isActive = !isActive; localStorage.setItem('isActive_Бесплатные', isActive.toString())" class="flex justify-center p-2 w-32 mr-2 rounded-full" hx-post="{{ route('filter') }}" hx-trigger="click" hx-target="#objects" hx-swap="outerHTML" hx-vals='{"categories": "Бесплатные" }'>Бесплатные</button>
            <button x-data="{ isActive: localStorage.getItem('isActive_Платные') === 'true' }" x-bind:class="{ 'bg-green-600 text-white': isActive, 'bg-green-200': !isActive }" x-on:click="isActive = !isActive; localStorage.setItem('isActive_Платные', isActive.toString())" class="flex justify-center p-2 w-32 mr-2 rounded-full" hx-post="{{ route('filter') }}" hx-trigger="click" hx-target="#objects" hx-swap="outerHTML" hx-vals='{"categories": "Платные" }'>Платные</button>
            <button x-data="{ isActive: localStorage.getItem('isActive_iOS') === 'true' }" x-bind:class="{ 'bg-green-600 text-white': isActive, 'bg-green-200': !isActive }" x-on:click="isActive = !isActive; localStorage.setItem('isActive_iOS', isActive.toString())" class="flex justify-center p-2 w-32 mr-2 rounded-full" hx-post="{{ route('filter') }}" hx-trigger="click" hx-target="#objects" hx-swap="outerHTML" hx-vals='{"categories": "iOS" }'>iOS</button>
            <button x-data="{ isActive: localStorage.getItem('isActive_Android') === 'true' }" x-bind:class="{ 'bg-green-600 text-white': isActive, 'bg-green-200': !isActive }" x-on:click="isActive = !isActive; localStorage.setItem('isActive_Android', isActive.toString())" class="flex justify-center p-2 w-32 mr-2 rounded-full" hx-post="{{ route('filter') }}" hx-trigger="click" hx-target="#objects" hx-swap="outerHTML" hx-vals='{"categories": "Android" }'>Android</button>
        </form>
        <ul id="objects" class="flex flex-wrap mt-8 grid grid-cols-2 gap-2">
            @foreach ($objects as $object)
                <li class="bg-indigo-400 mb-2 mr-4 px-4 py-3 rounded-lg text-white">
                    <strong>{{ $object->title }}</strong>
                    <ul class="flex text-xs mt-2">
                        @foreach ($object->categories as $category)
                            <li class="mr-2 border px-2 rounded-full">{{ $category->title }}</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </body>
</html>
