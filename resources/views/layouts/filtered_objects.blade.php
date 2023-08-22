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