@extends('layouts.app')

@section('titulo')
    Perfil: {{$user->username}}
@endsection

@section('contenido')

<div class="flex justify-center">
    <div class="w-full md:w-6/12 lg:w-6/12 flex flex-col items-center md:flex-row md:justify-center md:gap-10">
        <div class="w-5/12 md:w-6/12">
            <img src="{{ 
                $user->imagen 
                ? asset('perfiles') . '/' . $user->imagen 
                : asset('img/usuario.png')}}" alt="imagen usuario">
        </div>
        <div class="md:w-8/12 lg:w-6/12 flex flex-col items-center md:items-start py-10 md:py-0 md:justify-center ">
            
            <div class="flex gap-3 items-center">
                <p class="text-2xl text-eerieblack">{{ $user -> username }}</p>
                @auth
                @if($user->id === auth()->user()->id)   
                   <a class="text-huntergreen hover:text-eerieblack cursor-pointer" href="{{route('perfil.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                    </svg>                       
                   </a>
                @endif()
               @endauth
            </div>

            <p class="text-eerieblack text-sm mb-3 font-bold mt-5">
                {{$user->followers->count()}}
                <span class="font-normal">@choice('Seguidor|Seguidores', $user->followers->count() )</span>
            </p>

            <p class="text-eerieblack text-sm mb-3 font-bold">
                {{$user->followings->count()}}
                <span class="font-normal">Siguiendo</span>
            </p>

            <p class="text-eerieblack text-sm mb-3 font-bold">
                {{$user->posts->count()}}
                <span class="font-normal">Posts</span>
            </p>

            @auth
                @if($user->id !== auth()->user()->id)
                    @if(!$user->siguiendo(auth()->user()))
                        <form method="POST" action="{{route('users.follow', $user)}}">
                            @csrf
                            <input type="submit" class="bg-blue-600 text-white rounded-lg px-3 py-1 text-sm font-bold cursor-pointer" value="Seguir">
                        </form>
                    @else
                        <form method="POST" action="{{route('users.unfollow', $user)}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="bg-red-600 text-white rounded-lg px-3 py-1 text-sm font-bold cursor-pointer" value="Dejar de Seguir">
                        </form>
                    @endif
                @endif
            @endauth

        </div>
    </div>
</div>

<section class="container mx-auto align-center mt-10 ">
    <h2 class="text-3xl text-center text-eerieblack font-bold my-10">Publicaciones</h2>

    <x-listar-post :posts="$posts"/>

</section>

@endsection