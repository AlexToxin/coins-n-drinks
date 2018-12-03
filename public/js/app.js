$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

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
            console.log(error);
        });
}

function getDrink(id) {
    $.post('api/getDrink', {
            drink_id: id
        })
        .then(function(response) {
            alert(response['text']);
            $("#sum").html("Вы внесли: " + response['value'] + "₽");
        })
        .catch(function(error) {
            console.log(error);
        });
}