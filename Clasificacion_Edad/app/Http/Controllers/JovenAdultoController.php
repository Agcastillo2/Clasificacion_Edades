<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JovenAdultoController extends Controller
{
    public function index()
    {
        // Datos simulados de jóvenes adultos
        $jovenes = [
            ['nombre' => 'Carlos', 'edad' => 22, 'color' => '#c0eaff'],
            ['nombre' => 'Lucía', 'edad' => 28, 'color' => '#e0ffc0'],
            ['nombre' => 'Andrés', 'edad' => 25, 'color' => '#f0d0ff']
        ];

        return view('JovenAdulto.index', compact('jovenes'));
    }
}
