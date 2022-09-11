<x-layout>
    <div>
        {{ $product->name }}
    </div>
    <img src="{{ $product->img_src }}"
        alt="" width="100px">
    <div>
        {{ $product->catagory }}
    </div>
    <div>
        {{ $product->price }}
    </div>
    <div>
        {{ $product->description }}
    </div>
</x-layout>
