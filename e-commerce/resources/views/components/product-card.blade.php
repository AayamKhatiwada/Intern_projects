<div class="card col-sm-4 my-3" style="width: 18rem; border:none">
    <img class="card-img-top rounded-5" src="{{ $products->img_src }}"
        alt="Card image cap">
    <div class="card-body p-2">
        <h5 class="card-title">
            {{ $products->name }}
        </h5>
        <p class="card-text">Price : ${{ $products->price }}</p>
        <a href="#" class="btn btn-primary align-center">Add to cart</a>
    </div>
</div>
