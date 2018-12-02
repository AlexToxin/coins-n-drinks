<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Faker\Factory;

class DebugController extends Controller
{
    public function test(Request $request)
    {
        $model = 'App\\' . $request -> model;
        $query = $request -> function;

        $result = $model::where((new $model) -> getKeyName(), $request -> number) -> firstOrFail() -> $query;

        echo ('<pre>');
        print_r($result ? $result : (is_null($result) ? 'NULL' : 'FALSE'));
        echo ('</pre>');
    }

    public function main(Request $request)
    {
        $model = 'App\\' . $request -> model;
        $table = (new $model) -> getTable();
        $main = $model::all();
        $columns = Schema::getColumnListing($table);
        return view('debug.main', compact('main', 'columns'));
    }

    public function home()
    {
        $dir = str_replace('public', 'app', $_SERVER['DOCUMENT_ROOT']);
        $files = scandir($dir);

        $models = array();
        foreach($files as $file) {
          if ($file == '.' || $file == '..' || !preg_match('/\.php/', $file)) continue;
          $models[] = preg_replace('/\.php$/', '', $file);
        }
        return view('debug.home', compact('models'));
    }
}
