<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <div class="images p-3">
                    <div class="text-center p-4"> <img id="main-image" src="{{ $product->img_src }}" width="100%"
                            height="100%" class="rounded-5" /> </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mt-4 mb-3"> <span class="text-muted brand">{{ $product->catagory }}</span>
                    <h5 class="text-uppercase">{{ $product->name }}</h5>
                    <div class="price d-flex flex-row align-items-center"> <span class="act-price">Price:
                            ${{ $product->price }}</span>
                    </div>
                </div>
                <p class="about">{{ $product->description }}</p>
                <form action="/cart/{{ $product->id }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary mr-2 px-3 me-5">Add to cart</button>
                    <span>Quantity: </span>
                    <input type="number" id="quantity" name="quantity" min="1" max="100" value="1">
                </form>
            </div>
        </div>
    </div>
</x-layout>
