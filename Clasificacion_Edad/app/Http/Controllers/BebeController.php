<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BebeController extends Controller
{
    public function index()
    {
        // Datos estáticos (sin modelo)
        $bebes = [
            ['nombre' => 'Lucas', 'edad' => 12, 'color' => '#ffd6e0'],
            ['nombre' => 'Emma', 'edad' => 8, 'color' => '#d6e0ff'],
            ['nombre' => 'Mateo', 'edad' => 18, 'color' => '#d0f0c0']
        ];

        return view('Bebe.index', compact('bebes'));

    }

}
