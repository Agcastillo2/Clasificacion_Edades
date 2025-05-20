<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Edad;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function validarEdad(Request $request)
    {
        $request->validate([
            'edad' => 'required|integer|min:0|max:120'
        ]);

        $edad = $request->input('edad');
        $rango = '';
        $route = '';

        if ($edad <= 5) {
            $rango = 'Bebé';
            $route = 'Bebe';
        } elseif ($edad <= 12) {
            $rango = 'Niño';
            $route = 'Nino';
        } elseif ($edad <= 17) {
            $rango = 'Adolescente';
            $route = 'Adolecente';
        } elseif ($edad <= 25) {
            $rango = 'Joven Adulto';
            $route = 'JovenAdulto';
        } elseif ($edad <= 59) {
            $rango = 'Adulto';
            $route = 'Adulto';
        } elseif ($edad <= 74) {
            $rango = 'Adulto Mayor';
            $route = 'AdultoMayor';
        } else {
            $rango = 'Persona Longeva';
            $route = 'PersonaLongeva';
        }

        // Guardar en la base de datos
        $edadModel = Edad::create([
            'valor' => $edad,
            'rango' => $rango,
            'user_id' => Auth::id()
        ]);

        // Guardar en sesión para usuarios no autenticados
        if (!Auth::check()) {
            session(['edad_registrada' => $edadModel]);
        }

        return redirect()->route($route)->with('success', 'Bienvenido a la sección de '.$rango);
    }
}