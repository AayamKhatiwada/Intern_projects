<x-layout>
    <section>
        <x-featured-product :images="$products"/>
    </section>

    <section class="container my-5">
        <h3 class="border-bottom py-2">
            Products
        </h3>

        <div class="d-flex flex-wrap justify-content-around">
            @foreach ($products as $product)
                <x-product-card :products="$product" />
            @endforeach
            {{-- {{ $products->links() }} --}}
        </div>
    </section>
</x-layout>
