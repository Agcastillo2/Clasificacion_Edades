<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    public function handle(Request $request, Closure $next, string $rango): Response
    {
        // Obtener la última edad registrada
        $edad = Auth::check() 
            ? Auth::user()->edades()->latest()->first()
            : session('edad_registrada');

        if (!$edad) {
            return redirect()->route('login')->with('error', 'Debes ingresar tu edad primero');
        }

        // Verificar el rango de edad
        $rangoValido = match($rango) {
            'bebe' => $edad->valor <= 5,
            'nino' => $edad->valor >= 6 && $edad->valor <= 12,
            'adolescente' => $edad->valor >= 13 && $edad->valor <= 17,
            'joven-adulto' => $edad->valor >= 18 && $edad->valor <= 25,
            'adulto' => $edad->valor >= 26 && $edad->valor <= 59,
            'adulto-mayor' => $edad->valor >= 60 && $edad->valor <= 74,
            'persona-longeva' => $edad->valor >= 75,
            default => false
        };

        if (!$rangoValido) {
            return redirect()->route('login')->with('error', 'No tienes acceso a esta sección');
        }

        return $next($request);
    }
}