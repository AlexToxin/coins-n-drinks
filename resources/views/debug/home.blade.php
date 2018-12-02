<!doctype html>
    <style>
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 25px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .column {
            -webkit-column-width: 200px;
            -moz-column-width: 200px;
            column-width: 200px;
            -webkit-column-count: 3;
            -moz-column-count: 3;
            column-count: 3;
            -webkit-column-gap: 30px;
            -moz-column-gap: 30px;
            column-gap: 30px;
            -webkit-column-rule: 1px solid #ccc;
            -moz-column-rule: 1px solid #ccc;
            column-rule: 1px solid #ccc;
        }
    </style>
    <div class="container column">
        <div class="content">
            <div class="links">
                @foreach ($models as $model)
                    <a href="/debug/{{ $model }}">{{ $model }}</a><br>
                @endforeach
            </div>
        </div>
    </div>
