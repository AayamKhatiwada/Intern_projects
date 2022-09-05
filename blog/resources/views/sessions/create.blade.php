<x-layout>
    <section class="px-8 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-100 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log In!</h1>

            <form action="/login" method="post" class="mt-10">
                @csrf

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

                <button type="submit" class="btn btn-primary">Log in</button>
            </form>
        </main>
    </section>
</x-layout>
