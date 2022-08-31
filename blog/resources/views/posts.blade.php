<x-layout>
    @foreach ($posts as $post)
    <article>
        <h1>
            <a href="/posts/{{ $post->slug }}">
                {{$post->title}}
            </a>
        </h1>

        <p>
            By <a href="/authors/{{ $post->author->userName }}">{{ $post->author->name }}</a> in <a href="/catagories/{{ $post->catagory->slug }}">{{ $post->catagory->name }}</a>
        </p>

        <p><?= $post->excerpt ?></p>
    </article>

    @endforeach
</x-layout>