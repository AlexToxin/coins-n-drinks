<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drink;
use App\Coin;

class MainController extends Controller
{
    public function main(Request $request)
    {
        if(!$request->session()->get('coins'))
        {
            $request->session()->put('coins', "0");
        }
        return view('main', ['coinsSum' => $request->session()->get('coins'), 'drinks' => Drink::all(), 'coins' => Coin::all()]);
    }
}
