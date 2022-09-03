<x-layout>

    @include ('post._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-post-grid :posts="$posts" />
        @else
            <p class="text-center">There are no post yet</p>
        @endif
        {{-- <div class="lg:grid lg:grid-cols-3">
            <x-post-card />
            <x-post-card />
            <x-post-card />
        </div> --}}
    </main>



    <!-- @foreach ($posts as $post)
<article>
        <h1>
            <a href="/posts/{{ $post->slug }}">
                {{ $post->title }}
            </a>
        </h1>

        <p>
            By <a href="/authors/{{ $post->author->userName }}">{{ $post->author->name }}</a> in <a href="/catagories/{{ $post->catagory->slug }}">{{ $post->catagory->name }}</a>
        </p>

        <p><?= $post->excerpt ?></p>
    </article>
@endforeach -->
</x-layout>
