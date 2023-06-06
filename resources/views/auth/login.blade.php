@extends('layouts.app')

@section('titulo')
    Inicia Sesión en TDSCodeCampus
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-4/12 p-5">
            <img src="{{asset('img/inicio-sesion.webp')}}" alt="Imagen Registro de Usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{route('login')}}" novalidate>
                @csrf

                @if(session('mensaje'))
                    <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{session('mensaje')}}</p>
                @endif
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
                    <input type="checkbox" name="remember"> <label class="text-eerierblack text-sm">Mantener la sesión abierta</label>
                </div>

                <input type="submit" value="Iniciar Sesión" class="bg-redwood hover:bg-bloodred transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection