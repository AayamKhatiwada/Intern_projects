<a href="/products/{{ $products->id }}" style="text-decoration: none; color:black">
    <div class="card col-sm-4 my-3" style="width: 18rem; border:none">
        <img class="card-img-top rounded-5" src="{{ $products->img_src }}" width="200px" height="230px" alt="Card image cap">
        <div class="card-body p-2 d-flex flex-column align-items-center text-center">
            <h5 class="card-title mt-2">
                {{ $products->name }}
            </h5>
            <p class="card-text mt-2 mb-3">Price : ${{ $products->price }}</p>
            <button class="btn btn-primary align-center">View details</button>
        </div>
    </div>

</a>
