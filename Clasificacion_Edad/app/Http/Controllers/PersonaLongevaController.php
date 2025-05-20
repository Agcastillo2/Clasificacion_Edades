<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonaLongevaController extends Controller
{
    public function index()
    {
        $longevos = [
            ['nombre' => 'Don Ernesto', 'edad' => 94, 'color' => '#e6e6e6'],
            ['nombre' => 'Doña Carmen', 'edad' => 97, 'color' => '#f5f5dc'],
            ['nombre' => 'Don Alberto', 'edad' => 102, 'color' => '#fafad2']
        ];

        return view('PersonaLongeva.index', compact('longevos'));
    }
}

