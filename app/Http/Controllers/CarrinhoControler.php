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

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto adicionado no carrinho com sucesso!');
    }

    public function removeCarrinho(Request $request)
    {
        \Cart::remove($request->id);

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto removido do carrinho com sucesso!');
    }
    
    public function atualizaCarrinho(Request $request)
    {
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value'    => $request->quantity
            ]
        ]);

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto atualizado com sucesso!');
    }
    
    public function limparCarrinho(Request $request)
    {
        \Cart::clear();

        return redirect()->route('site.carrinho')->with('aviso', 'Seu carrinho está vazio!');
    }
}
