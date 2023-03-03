<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Decoration;
use App\Models\Handle;
use App\Models\Height;
use App\Models\Open;
use App\Models\Order;
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

    /**
     * Добавление заказа в бд
     *
     * @param Request $request
     * @return response с резьлутатом выполнения
     */
    public function store(Request $request)
    {
        $request->validate([
            'color_id' => 'required|integer|exists:colors,id',
            'tape_id' => 'required|integer|exists:tapes,id',
            'handle_id' => 'required|integer|exists:handles,id',
            'width_id' => 'required|integer|exists:widths,id',
            'height_id' => 'required|integer|exists:heights,id',
            'open_id' => 'required|integer|exists:opens,id',
            'decoration_id' => 'required|integer|exists:decorations,id',
        ]);
        $data = [
            'title' => $request->title,
            'year' => $request->year,
            'description' => $request->description,
            'img' => $request->img,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
        ];

        $newOrder = new Order($data);
        $newOrder->save();
    }
}
