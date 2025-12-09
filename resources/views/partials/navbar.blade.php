@php
    use App\Models\Menu;
    use App\Models\MenuItem;

    $menu = Menu::where('slug', 'main')->first();

    $items = $menu
        ? MenuItem::with('children.children')
            ->where('menu_id', $menu->id)
            ->whereNull('parent_id')
            ->orderBy('order')
            ->get()
        : collect();
@endphp

<nav class="bg-gray-800 text-white">
    <div class="container mx-auto flex justify-between items-center p-4">
        {{-- Logo --}}
        <div class="text-xl font-bold">
            {{ config('app.name') }}
        </div>

        {{-- Desktop Menu --}}
        <ul class="hidden md:flex space-x-6">
            {{-- Loop menu items --}}
            @foreach ($items as $item)
                <li class="relative group">
                    <a href="{{ $item->url }}" class="px-4 py-2 hover:bg-gray-700 rounded">
                        {{ $item->label }}
                    </a>

                    {{-- Dropdown biasa --}}
                    @if ($item->children->count() && $item->label !== 'Services')
                        <ul class="absolute top-full left-0 z-50 hidden group-hover:block bg-gray-700 text-white rounded shadow-lg min-w-[180px]">
                            @foreach ($item->children as $child)
                                <li>
                                    <a href="{{ $child->url }}" class="block px-4 py-2 hover:bg-gray-600">
                                        {{ $child->label }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    {{-- Mega Menu khusus Services --}}
                    @if ($item->label === 'Services')
                        <div class="absolute left-0 top-full hidden group-hover:flex w-screen max-w-4xl bg-gray-700 text-white shadow-lg p-8 space-x-8">
                            <div>
                                <h3 class="font-bold mb-2">Web Development</h3>
                                <ul>
                                    <li><a href="/services/frontend" class="block py-1 hover:underline">Frontend</a></li>
                                    <li><a href="/services/backend" class="block py-1 hover:underline">Backend</a></li>
                                    <li><a href="/services/fullstack" class="block py-1 hover:underline">Fullstack</a></li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="font-bold mb-2">Design</h3>
                                <ul>
                                    <li><a href="/services/uiux" class="block py-1 hover:underline">UI/UX</a></li>
                                    <li><a href="/services/branding" class="block py-1 hover:underline">Branding</a></li>
                                    <li><a href="/services/illustration" class="block py-1 hover:underline">Illustration</a></li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="font-bold mb-2">Other</h3>
                                <ul>
                                    <li><a href="/services/seo" class="block py-1 hover:underline">SEO</a></li>
                                    <li><a href="/services/marketing" class="block py-1 hover:underline">Marketing</a></li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>

        {{-- Mobile Hamburger --}}
        <button id="menu-toggle" class="md:hidden focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden md:hidden bg-gray-700">
        <ul class="flex flex-col space-y-2 p-4">
            @foreach ($items as $item)
                <li>
                    <a href="{{ $item->url }}" class="block px-4 py-2 hover:bg-gray-600">
                        {{ $item->label }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>