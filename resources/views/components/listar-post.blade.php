<div>
    @if ($posts->count())
        <div class="container px-10 grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
            <div>
                <a class="text-center" href="{{ route('posts.show', ['post' => $post, 'user'=>$post->user]) }}">
                    <img src="{{ asset('uploads') . '/' . $post->imagen}}" alt="Imagen del post {{$post->titulo}}">
                </a>
            </div>
            @endforeach
        </div>

        <div class="mt-10 px-10">
            {{$posts->links()}}
        </div>
    @else
        <p>No hay posts, sigue a alguien para ver sus posts o a quienes sigues no tienen posts</p>
    @endif
</div>