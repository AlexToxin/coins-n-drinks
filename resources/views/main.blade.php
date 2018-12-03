@extends('layouts.app')
@section('content')
    <form class="container">
        <h2 class="row">
            <div class="col" style="width:100%; text-align:center" id="sum">
                Вы внесли: {{ $coinsSum }}₽
            </div>
        </h2>
        <h4 style="text-align:center">
            Монеты:
        </h4>
        <div class="row">
            @foreach ($coins as $coin)
                <div class="col">
                    @if ($coin->blocked)
                        <input type="button" disabled class="b-button" value="{{$coin -> value}}₽" onclick="throwCoin()">
                    @else
                        <input type="button" class="b-button" value="{{$coin -> value}}₽" onclick="throwCoin()">
                    @endif
                </div>
            @endforeach
        </div>
        <h4 style="text-align:center">
            Напитки:
        </h4>
        <div class="row">
            @foreach ($drinks as $drink)
                <div class="col">
                    @if ($drink->blocked)
                        <input type="button" disabled class="b-button" value="{{$drink -> name}} ({{$drink -> price}}₽)" onclick="getDrink({{$drink -> id}})">
                    @else
                        <input type="button" class="b-button" value="{{$drink -> name}} ({{$drink -> price}}₽)" onclick="getDrink({{$drink -> id}})">
                    @endif
                </div>
            @endforeach
        </div>
    </form>

    <div class="b-popup" id="popup1">
        <div class="b-popup-content">
            <div id="popup-text">
                Text in Popup
            </div>
            <a href="javascript:PopUpHide()">Закрыть</a>
        </div>
    </div>
@endsection
@section('add_end')
    <script>
        $(document).ready(function(){
            //Скрыть PopUp при загрузке страницы
            PopUpHide();
        });

        //Функция отображения PopUp
        function PopUpShow(){
            $("#popup1").show();
        }

        //Функция скрытия PopUp
        function PopUpHide(){
            $("#popup1").hide();
        }

        function throwCoin(e) {
            e = window.event;
            var sender = e.srcElement || e.target;
            $.post('api/throwCoin', {
                    value: sender.value.slice(0, -1)
                })
                .then(function(response) {
                    $("#sum").html("Вы внесли: " + response + "₽");
                })
                .catch(function(error) {
                    $("#popup-text").html(error['responseJSON']['message']);
                    PopUpShow();
                });
        }

        function getDrink(id) {
            $.post('api/getDrink', {
                    drink_id: id
                })
                .then(function(response) {
                    $("#popup-text").html(response['text']);
                    PopUpShow();
                    $("#sum").html("Вы внесли: " + response['value'] + "₽");
                })
                .catch(function(error) {
                    console.log(responseJSON['message']);
                });
        }
    </script>
@endsection
