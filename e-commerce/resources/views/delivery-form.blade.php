<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 p-2">
                @guest
                    <div>
                        <a href="/login">Login</a>
                    </div>
                    OR
                @endguest
                <form action="/delivery-form/submit-order" method="POST">
                    @csrf
                    @guest
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">User Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter user name"
                                name="name">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter email"
                                name="email">
                        </div>
                    @else
                        <h5>
                            <div class="d-block">
                                Hello,
                            </div>
                            <div class="d-block ms-5">
                                {{ ucwords(auth()->user()->name) }}
                            </div>
                        </h5>
                        <input type="text" class="form-control" id="id" placeholder="Enter id" name="id"
                            style="display: none" value="{{ auth()->user()->id }}">
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                            style="display: none" value="{{ auth()->user()->name }}">
                        <input type="text" class="form-control" id="name" placeholder="Enter address" name="address"
                            style="display: none" value="{{ auth()->user()->address }}">
                        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email"
                            style="display: none" value="{{ auth()->user()->email }}">
                        <input type="text" class="form-control" id="phoneno" placeholder="Enter phoneno" name="phoneno"
                            style="display: none" value="{{ auth()->user()->phoneno }}">
                    @endguest
                    <div class="mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter user address"
                            name="address" @auth value="{{ auth()->user()->address }}" @endauth>
                    </div>
                    <div class="mb-3">
                        <label for="phoneno" class="form-label">Phone number:</label>
                        <input type="text" class="form-control" id="phoneno" placeholder="Enter user phoneno"
                            name="phoneno" @auth value="{{ auth()->user()->phoneno }}" @endauth>
                    </div>
                    <button type="submit" class="btn btn-primary mb-5">Submit</button>
                </form>
            </div>
            <div class="col-sm-6">
                <h3 class="m-3">Cart</h3>
                <div class="row my-3 mx-1 px-2">
                    <div class="col-5">Name:</div>
                    <div class="col-3">Quantity:</div>
                    <div class="col-2">Price:</div>
                    <div class="col-2">Total:</div>
                </div>
                @php
                    $total = 0;
                @endphp
                @foreach (Session::get('cart') as $cart)
                    <div class="row bg-primary rounded-3 my-3 mx-1 text-white px-2 py-2">
                        <div class="col-5">{{ $cart['name'] }}</div>
                        <div class="col-3">{{ $cart['quantity'] }}</div>
                        <div class="col-2">${{ $cart['price'] }}</div>
                        <div class="col-2">${{ $cart['price'] * $cart['quantity'] }}</div>
                    </div>
                    @php
                        $total = $total + $cart['quantity'] * $cart['price'];
                    @endphp
                @endforeach
                @php
                    session()->put('total', $total);
                @endphp
                <div class="row bg-danger rounded-3 my-3 mx-1 text-white px-2 py-2">
                    <div class="col-10">Total</div>
                    <div class="col-2">${{ session()->get('total') }}</div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
