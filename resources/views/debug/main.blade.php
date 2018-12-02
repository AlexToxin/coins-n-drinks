<div class="container">
    @foreach ($main as $source)
        @foreach ($columns as $column)
            <p><b><?=ucfirst($column)?></b>: {{ $source->$column }}</p>
        @endforeach
        <br><br>
    @endforeach
</div>