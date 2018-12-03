<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drink;

class ApiController extends Controller
{
    public function throwCoin(Request $request)
    {
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
