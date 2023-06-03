<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoControler extends Controller
{
    public function carrinhoLista()
    {
        $itens = \Cart::getContent();

        dd($itens);
    }
}
