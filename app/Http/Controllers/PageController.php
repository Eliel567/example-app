<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function tela1()
    {
        return view('tela1');
    }

    public function tela2()
    {
        return view('tela2');
    }
    public function appTela()
{
    return view('app_tela');
}

}
