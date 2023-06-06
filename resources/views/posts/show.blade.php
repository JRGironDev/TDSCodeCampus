@extends('layouts.app');

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')

<div class="container mx-auto md:flex gap-8 px-10">
    <div class="md:w-1/2">

        <img src="{{ asset('uploads') . '/' . $post -> imagen}}" alt="Imagen del Post {{ $post -> titulo}}">
        
        <div class="p-3 flex items-center gap-4">
            @auth   
                <livewire:like-post :post="$post" />
            @endauth
        </div>

        <div class="mt-5">
            <p class="font-bold">{{$post -> user -> username}}</p>
            <p class="text-sm text-huntergreen">{{$post -> created_at->diffForHumans()}}</p>
            <p class="mt-5">{{$post->descripcion}}</p>
        </div>

         @auth
            @if ($post->user_id === auth()->user()->id)
                <form method="POST" action="{{route('posts.destroy', $post)}}">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Eliminar Publicación" class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
                </form>
            @endif
         @endauth
    </div>
    <div class="mt-10 md:mt-0 md:w-1/2">
        <div class="shadow bg-white p-5 mb-5">

            @auth
                
            <p class="text-xl font-bold text-center mb-10">Agrega un nuevo comentario</p>

            @if(session('mensaje'))
                <div class="bg-huntergreen p-2 rounded-lg mb-6 text-white text-center font-bold">
                    {{session('mensaje')}}
                </div>
            @endif

            <form action="{{ route('comentarios.store', ['post' => $post, 'user'=>$user])}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="comentario" class="mb-1 block text-eerierblack font-bold">Comentario</label>
                    <textarea id="comentario" name="comentario" placeholder="Agrega un comentario" class="border p-2 w-full rounded-lg @error('comentario') border-red-500 @enderror"></textarea>
                    
                    @error('comentario')
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{$message}}</p>
                    @enderror
                </div>
    
                <input type="submit" value="Comentar" class="bg-redwood hover:bg-bloodred transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>

            @endauth

            <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                @if($post->comentarios->count())
                    @foreach ( $post->comentarios as $comentario )
                        <div class="p-5 border-huntergreen border-b">
                            <a href="{{route('posts.index', $comentario->user)}}" class="font-bold text-huntergreen">{{$comentario->user->username}}</a>
                            <p>{{$comentario->comentario}}</p>
                            <p class="text-sm text-huntergreen">{{$comentario->created_at->diffForHumans()}}</p>
                        </div>
                    @endforeach
                @else
                    <p class="p-10 text-center">No hay comentarios aún</p>
                @endif
            </div>
        </div>

    </div>
    
</div>

@endsection