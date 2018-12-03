<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coin;
use App\Drink;

class ApiController extends Controller
{
    public function throwCoin(Request $request)
    {
        if (Coin::where('value', $request->value)->firstOrFail()->blocked)
        {
            abort(403, 'Монета заблокирована');
        }
        if ($request->session()->has('coins'))
        {
            $request->session()->put('coins', $request->session()->get('coins') + $request->value);
        }
        else {
            $request->session()->put('coins', $request->value);
        }
        return $request->session()->get('coins');
    }

    public function getDrink(Request $request)
    {
        $drink = Drink::findOrFail($request->drink_id);
        if ($drink->blocked)
        {
            abort(403, 'Напиток заблокирован');
        }
        if ($request->session()->get('coins') >= $drink->price)
        {
            $request->session()->put('coins', $request->session()->get('coins') - $drink->price);
            return array('text' => "Получите Ваш " . $drink->name, 'value' => $request->session()->get('coins'));
        }
        else {
            return array('text' => "Недостаточно средств", 'value' => $request->session()->get('coins'));
        }
    }
}
