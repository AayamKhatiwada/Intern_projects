<x-layout>
    <div class="d-flex flex-wrap justify-content-around container mb-5">
        @foreach ($products as $item)
            <x-product-card :products="$item" />
        @endforeach
    </div>
</x-layout>
