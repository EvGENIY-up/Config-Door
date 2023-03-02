<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Decoration;
use App\Models\Handle;
use App\Models\Height;
use App\Models\Open;
use App\Models\Tape;
use App\Models\Width;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $colors = Color::all();
        $tapes = Tape::all();
        $handles = Handle::all();
        $widths = Width::all();
        $heights = Height::all();
        $opens = Open::all();
        $decorations = Decoration::all();

        return view('home', [
            'colors' => $colors,
            'tapes' => $tapes,
            'handles' => $handles,
            'widths' => $widths,
            'heights' => $heights,
            'opens' => $opens,
            'decorations' => $decorations,
        ]);
    }
}
