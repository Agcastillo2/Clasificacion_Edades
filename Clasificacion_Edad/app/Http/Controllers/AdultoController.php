<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdultoController extends Controller
{
    public function index()
    {
        // Datos de ejemplo (sin modelo)
        $adultos = [
            ['nombre' => 'Carlos', 'edad' => 30, 'color' => '#cce5ff'],
            ['nombre' => 'Lucía', 'edad' => 45, 'color' => '#e6ccff'],
            ['nombre' => 'María', 'edad' => 38, 'color' => '#ffd9b3']
        ];

        return view('Adulto.index', compact('adultos'));
    }
}
