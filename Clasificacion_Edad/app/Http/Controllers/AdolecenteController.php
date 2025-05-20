<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdolecenteController extends Controller
{
    public function index()
    {
        // Datos estáticos (sin modelo)
        $adolecentes = [
            ['nombre' => 'Carlos', 'edad' => 13, 'color' => '#ffe4b5'],
            ['nombre' => 'Valeria', 'edad' => 15, 'color' => '#b0e0e6'],
            ['nombre' => 'Sofía', 'edad' => 17, 'color' => '#e6e6fa']
        ];

        return view('Adolecente.index', compact('adolecentes'));
    }
}
