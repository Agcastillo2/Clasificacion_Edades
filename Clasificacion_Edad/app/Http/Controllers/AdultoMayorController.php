<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdultoMayorController extends Controller
{
    public function index()
    {
        // Datos estáticos simulados
        $mayores = [
            ['nombre' => 'Don Jorge', 'edad' => 72, 'color' => '#f8e0c0'],
            ['nombre' => 'Doña Rosa', 'edad' => 80, 'color' => '#d0d0d0'],
            ['nombre' => 'Don Alfredo', 'edad' => 67, 'color' => '#e0c0f8']
        ];

        return view('AdultoMayor.index', compact('mayores'));
    }
}
    