<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        return view('app.index'); // tela principal
    }

    public function tela1()
    {
        return view('app.tela1');
    }

    public function tela2()
    {
        return view('app.tela2');
    }
}
