@auth
    <x-panel>
        <form action="/posts/{{ $post->slug }}/comments" method="post" class="border border-gray20 p-6 rounded-xl">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/u={{ auth()->id() }}" alt="" width="40" height="40"
                    class="rounded-full">
                <h2 class="ml-4">want to participate</h2>
            </header>
            <div class="mt-6">
                <textarea name="body" id="" rows="5" class="w-full text-sm focus:outline-none focus:ring"
                    placeholder="Think of something " required></textarea>

                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6">
                <x-submit-button>Post</x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a><a href="/login" class="hover:underline">Log
            in</a> to leave a comment
    </p>
@endauth
