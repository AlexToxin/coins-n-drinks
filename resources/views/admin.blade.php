@extends('layouts.app')
@section('content')
    <div class="row">
        @foreach ($coins as $coin)
        <div class="col border mx-5">
            <p>Номинал: <b>{{$coin -> value}}</b>₽</p>
            <p>Остаток: <b>{{$coin -> amount}}</b></p>
            <p id="coin" ondblclick="changeCoin({{$coin -> id}})">Заблокировано: <b>{{$coin -> blocked ? 'true' : 'false'}}</b></p>
        </div>
        @endforeach
    </div>
    <div class="row">
        @foreach ($drinks as $drink)
        <div class="col border mx-5">
            <p>Название: <b>{{$drink -> name}}</b></p>
            <p>Цена: <b>{{$drink -> price}}₽</b></p>
            <p>Остаток: <b>{{$drink -> amount}}</b></p>
            <p id="drink" ondblclick="changeDrink({{$drink -> id}})">Заблокировано: <b>{{$drink -> blocked ? 'true' : 'false'}}</b></p>
        </div>
        @endforeach
    </div>
@endsection

@section('add_end')
    <script>
        function changeCoin(id) {
            $.post('api/changeCoin', {
                coin_id: id
            })
            .then(function(response) {
                $("#coin").html("Заблокировано: " + response);
            })
            .catch(function(error) {
                console.log(responseJSON['message']);
            });
        }

        function changeDrink(id) {
            $.post('api/changeDrink', {
                drink_id: id
            })
            .then(function(response) {
                $("#drink").html("Заблокировано: " + response);
            })
            .catch(function(error) {
                console.log(responseJSON['message']);
            });
        }
    </script>
@endsection
