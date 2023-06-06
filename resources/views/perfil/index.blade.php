@extends('layouts.app');

@section('titulo')
    Editar Perfil: {{ auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{route('perfil.store')}}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-1 block text-eerierblack font-bold">Username</label>
                    <input type="text" id="username" name="username" placeholder="Tu nombre de Usuario" class="border p-2 w-full rounded-lg @error('username') border-red-500 @enderror" value="{{ auth() -> user()->username}}">
                    
                    @error('username')
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" class="mb-1 block text-eerierblack font-bold">Imagen Perfil</label>
                    <input type="file" id="imagen" name="imagen" class="border p-2 w-full rounded-lg" value="" accept=".jpg, .jpeg, .png"> 
                </div>

                <input type="submit" value="Guardar Cambios" class="bg-redwood hover:bg-bloodred transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

            </form>
        </div>
    </div>
@endsection