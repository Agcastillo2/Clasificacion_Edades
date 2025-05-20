@extends('layouts.app')

@section('title', 'Clasificación por Edad')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-pink-50 to-purple-50 flex flex-col items-center justify-center p-4">
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg overflow-hidden transition-all transform hover:scale-[1.02] duration-300">
        <div class="bg-pink-600 py-4 px-6">
            <h1 class="text-2xl md:text-3xl font-bold text-white text-center">
                Clasificación por Edad 🎂
            </h1>
        </div>
        
        <div class="p-6">
            <form action="{{ route('redirigir.edad') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label for="edad" class="block text-gray-700 font-medium mb-2">
                        ¿Cuántos años tienes?
                    </label>
                    <input 
                        type="number" 
                        id="edad" 
                        name="edad" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent transition"
                        placeholder="Ingresa tu edad (0-120)"
                        min="0" 
                        max="120" 
                        required
                        autofocus
                    >
                    <p class="mt-1 text-sm text-gray-500">
                        Descubre a qué grupo de edad perteneces
                    </p>
                </div>
                
                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-pink-600 to-purple-600 text-white font-bold py-3 px-4 rounded-lg hover:opacity-90 transition duration-300 flex items-center justify-center space-x-2"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span>Ver mi clasificación</span>
                </button>
            </form>
        </div>
        
        @if(session('error'))
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mx-6 mb-6 rounded">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700">
                            {{ session('error') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
    
    <div class="mt-8 text-center text-gray-600">
        <p class="text-sm">
            Sistema de clasificación por grupos de edad © {{ date('Y') }}
        </p>
    </div>
</div>
@endsection