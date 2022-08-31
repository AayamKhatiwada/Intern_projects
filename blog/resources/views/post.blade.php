<x-layout>
    <article>
        <h1>{{$post-> title}}</h1>

        <p>
            By <a href="/authors/{{ $post->author->userName }}">{{ $post->author->name }}</a> in <a href="/catagories/{{ $post->catagory->slug }}">{{ $post->catagory->name }}</a>
        </p>

        <p>
            {!! $post-> body !!}
        </p>
    </article>

    <a href="/">Go back</a>
</x-layout>