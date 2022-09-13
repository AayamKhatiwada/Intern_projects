<x-layout>
    @if (Session::get('cart'))
        <div class="container my-5" style="min-height: 400px">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price per piece</th>
                        <th scope="col">Catagory</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total price</th>
                        <th scope="col"><a href="/delete-all-session">Delete All</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Session::get('cart') as $cart)
                        <tr>
                            <td>{{ $cart['name'] }}</td>
                            <td>${{ $cart['price'] }}</td>
                            <td>{{ $cart['catagory'] }}</td>
                            <td>{{ $cart['quantity'] }}</td>
                            <td>${{ $cart['quantity']*$cart['price']  }}</td>
                            <td>
                                <a href="/delete-cart/{{ $cart['id'] }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <a class="btn btn-primary mb-2" href="/delivery-form">Proceed</a>
            </table>

        </div>
    @else
        <div class="container">
            <h1 class="d-flex justify-content-center align-items-center" style="min-height: 500px">There is nothing in the cart</h1>
        </div>
    @endif
</x-layout>
