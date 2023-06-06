@extends('layouts.app')

@section('titulo')
    Registrate en TDSCodeCampus
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-4/12 p-5">
            <img src="{{asset('img/registro.jpg')}}" alt="Imagen Registro de Usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('register')}}" method="post" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-1 block text-eerierblack font-bold">Nombre</label>
                    <input type="text" id="name" name="name" placeholder="Ingresa tu Nombre" class="border p-2 w-full rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name')}}">
                    
                    @error('name')
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block text-eerierblack font-bold">Usuario</label>
                    <input type="text" id="username" name="username" placeholder="Ingresa tu Usuario" class="border p-2 w-full rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username')}}">
                
                    @error('username')
                    <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-1 block text-eerierblack font-bold">Email</label>
                    <input type="email" id="email" name="email" placeholder="Ingresa tu Email" class="border p-2 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email')}}">
                
                    @error('email')
                    <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-1 block text-eerierblack font-bold">Password</label>
                    <input type="password" id="password" name="password" placeholder="Ingresa tu Contraseña" class="border p-2 w-full rounded-lg @error('password') border-red-500 @enderror">
                
                    @error('password')
                    <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-1 block text-eerierblack font-bold">Repetir Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite tu Contraseña" class="border p-2 w-full rounded-lg">
                </div>
                
                <input type="submit" value="Crear Cuenta" class="bg-redwood hover:bg-bloodred transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection