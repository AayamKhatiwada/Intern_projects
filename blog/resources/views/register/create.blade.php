<x-layout>
    <section class="px-8 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-100 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>

            <form action="/register" method="post" class="mt-10">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                        placeholder="" value="{{ old('name') }}">

                    {{-- must be equal to name --}}
                    @error('name')
                        <p class="text-red-500 text-xs mt-3">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId"
                        placeholder="" value="{{ old('username') }}">

                    {{-- must be equal to name --}}
                    @error('username')
                        <p class="text-red-500 text-xs mt-3">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email"
                        aria-describedby="emailHelpId" placeholder="" value="{{ old('email') }}">

                    {{-- must be equal to name --}}
                    @error('email')
                        <p class="text-red-500 text-xs mt-3">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="Password" class="form-control" name="password" id="password" aria-describedby="helpId"
                        placeholder="">
                </div>

                {{-- must be equal to name --}}
                @error('password')
                    <p class="text-red-500 text-xs mt-3">{{ $message }}</p>
                @enderror

                <button type="submit" class="btn btn-primary">Submit</button>

                {{-- validation error at the buttom --}}
                {{-- @if ($errors->any())
                    <ul>
                      @foreach ($errors->all() as $error)
                          <li class="text-red-500 text-xs">{{ $error }}</li>
                      @endforeach
                    </ul>
                @endif --}}
            </form>
        </main>
    </section>
</x-layout>
