<x-layout>
    @if (Session::get('cart'))
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Edit / Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Session::get('cart') as $cart)
                        <tr>
                            <td>{{ $cart['name'] }}</td>
                            <td>Price: ${{ $cart['price'] }}</td>
                            <td><a href="/delete-cart/{{ $cart['id'] }}">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h1 class="text-center">There is nothing in the cart</h1>
    @endif
</x-layout>
