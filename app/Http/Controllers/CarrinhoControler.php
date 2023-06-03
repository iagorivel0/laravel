<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoControler extends Controller
{
    public function carrinhoLista()
    {
        $itens = \Cart::getContent();

        return view('site.carrinho', compact('itens'));
    }

    public function adicionaCarrinho(Request $request)
    {
        \Cart::add([
            'id'         => $request->id,
            'name'       => $request->name,
            'price'      => $request->price,
            'quantity'   => $request->qnt,
            'attributes' => [
                'image:' => $request->img
            ]
        ]);
    }
}
