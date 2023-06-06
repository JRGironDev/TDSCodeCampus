@extends('layouts.app')

@section('titulo')
    Crea una nueva publicación
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('imagenes.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full bg-white h-96 rounded flex flex-col justify-center items-center text-eerieblack">
                @csrf
            </form>
        </div> 

        <div class="container p-10 mt-10 bg-white rounded-lg shadow-xl md:w-1/2 md:mr-10 md:mt-0">
            <form action="{{route('posts.store')}}" method="post" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-1 block text-eerierblack font-bold">Título</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Ingresa el título de tu publicación" class="border p-2 w-full rounded-lg @error('titulo') border-red-500 @enderror" value="{{ old('titulo')}}">
                    
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-1 block text-eerierblack font-bold">Descripción</label>
                    <textarea id="descripcion" name="descripcion" placeholder="Ingresala la descripción de tu publicación" class="border p-2 w-full rounded-lg @error('descripcion') border-red-500 @enderror">{{ old('descripcion')}}</textarea>
                    
                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input name="imagen" type="hidden" value={{ old('imagen')}}>

                    @error('imagen')
                    <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{$message}}</p>
                @enderror
                </div>

                <input type="submit" value="Crear Publicación" class="bg-redwood hover:bg-bloodred transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

            </form>
        </div>
        
    </div>
@endsection