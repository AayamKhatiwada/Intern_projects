<x-layout>
    {{-- @if ($products != []) --}}
        <div class="d-flex flex-wrap justify-content-around container mb-5">
            @foreach ($products as $item)
                <x-product-card :products="$item" />
            @endforeach
        </div>
    {{-- @else
        <h1 class="container text-center mt-5" style="min-height: 450px">'{{ request('search') }}' product not found</h1>
    @endif --}}
</x-layout>
