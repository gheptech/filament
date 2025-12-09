<li class="relative group">
    <a href="{{ $item->url }}" class="px-4 py-2 block hover:underline">
        {{ $item->label }}
    </a>

    @if ($item->children->count())
        <ul class="absolute top-full left-0 z-50 hidden group-hover:block bg-gray-700 text-white rounded shadow-lg min-w-[180px]">
            @foreach ($item->children as $child)
                <li class="relative group">
                    <a href="{{ $child->url }}" class="block px-4 py-2 hover:bg-gray-600">
                        {{ $child->label }}
                    </a>

                    @if ($child->children->count())
                        <ul class="absolute left-full top-0 ml-2 z-50 hidden group-hover:block bg-gray-700 text-white rounded shadow-lg min-w-[180px]">
                            @foreach ($child->children as $grandchild)
                                @include('components.menu-item', ['item' => $grandchild])
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</li>