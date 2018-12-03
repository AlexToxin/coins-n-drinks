@extends('layouts.app')
@section('content')
    <form>
        <div class="row">
            <div class="col" style="width:100%; text-align:center" id="sum">
                Вы внесли: {{ $coinsSum }}₽
            </div>
        </div>
        <div class="row">
            @foreach ($coins as $coin)
                <div class="col">
                    <input type="button" style="width: 100%" value="{{$coin -> value}}₽" onclick="throwCoin()">
                </div>
            @endforeach
        </div>
        <div class="row">
            @foreach ($drinks as $drink)
                <div class="col">
                    <input type="button" style="width: 100%" value="{{$drink -> name}} ({{$drink -> price}}₽)" onclick="getDrink({{$drink -> id}})">
                </div>
            @endforeach
        </div>
    </form>
@endsection
