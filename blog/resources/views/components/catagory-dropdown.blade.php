<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full text-left flex lg:inline-flex">

            {{ isset($currentCatagory) ? ucwords($currentCatagory->name) : 'Catagories' }}

            <x-icons name="dropDown" class=" absolute pointer-events-none" style="right: 12px;"></x-icons>
        </button>
    </x-slot>


    <x-dropdown-items href="/?{{ http_build_query(request()->except('catagory', 'page')) }}" :active="request()->routeIs('home')">All</x-dropdown-items>

    @foreach ($catagories as $catagory)
        {{-- :active="isset($currentCatagory) && $currentCatagory->is($catagory)" --}}
        <x-dropdown-items href="/?catagory={{ $catagory->slug }}&{{ http_build_query(request()->except('catagory', 'page')) }}" :active="request()->is('catagories/' . $catagory->slug)">
            {{-- it checks the url and check if the catagory-> slug is equals to the url --}}
            {{ ucwords($catagory->name) }}</x-dropdown-items>
    @endforeach

</x-dropdown>