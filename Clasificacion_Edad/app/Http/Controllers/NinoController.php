<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NinoController extends Controller
{
    public function index()
    {
        $ninos = [
            ['nombre' => 'Ana', 'edad' => 5, 'color' => '#ffe4b5'],
            ['nombre' => 'Tomás', 'edad' => 7, 'color' => '#add8e6'],
            ['nombre' => 'Sofía', 'edad' => 9, 'color' => '#98fb98']
        ];

        return view('Nino.index', compact('ninos'));
    }
}
