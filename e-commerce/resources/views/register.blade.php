<x-layout>
    <div class="container w-50 my-5">
        <form action="/register" method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>

            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>

            <div class="mb-3 mt-3">
                <label for="phoneno" class="form-label">Phone number:</label>
                <input type="text" class="form-control" id="phoneno" placeholder="Enter Phone Number" name="phoneno">
            </div>

            <div class="mb-3 mt-3">
                <label for="address" class="form-label">Address:</label>
                <input type="address" class="form-control" id="address" placeholder="Enter address" name="address">
            </div>

            <div class="mb-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-layout>
