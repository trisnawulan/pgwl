<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index() //(funtion index atau sbg method)
    {
        $data = [
            "title"=> "Petaku"
        ];

        if (auth()->check()) {
            return view('index', $data);
        } else {
            return view('index-public', $data);
        }
    }
        //return view('index', $data);
        //Digunakan untuk memanggil view index (file view index.blade.php)


    public function table()
    {
        $data =[
            "title" => "Table" //Digunakan untuk memanggil view table (file view table.blade.php)
        ];
        return view ('table', $data);
    }
}
