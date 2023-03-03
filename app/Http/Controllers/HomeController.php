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
use Barryvdh\DomPDF\Facade\Pdf;

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
            'color_id' => $request->color_id,
            'tape_id' => $request->tape_id,
            'handle_id' => $request->handle_id,
            'width_id' => $request->width_id,
            'height_id' => $request->height_id,
            'open_id' => $request->open_id,
            'decoration_id' => $request->decoration_id,
        ];

        $newOrder = new Order($data);
        $newOrder->save();

        $orderData = [
            'Цвет покраски:' => $newOrder->color->name,
            'Цвет плёнки:' => $newOrder->tape->name,
            'Цвет ручки:' => $newOrder->handle->name,
            'Ширина:' => $newOrder->width->name,
            'Высота:' => $newOrder->height->name,
            'Открывание:' => $newOrder->open->name,
            'Аксесуар:' => $newOrder->decoration->name,
            'Полная стоимость:' => $newOrder->color->price + $newOrder->tape->price + $newOrder->handle->price +
                $newOrder->width->price + $newOrder->height->price + $newOrder->open->price + $newOrder->decoration->price,
        ];

        $pdf = Pdf::loadView('pdf', ['orderData' => $orderData]);
        $pdf->save('myfile.pdf');
    }
}
