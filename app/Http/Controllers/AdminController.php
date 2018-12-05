<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drink;
use App\Coin;

class AdminController extends Controller
{
    public function main(Request $request)
    {
        return view('admin', ['coins' => Coin::all(), 'drinks' => Drink::all()]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
