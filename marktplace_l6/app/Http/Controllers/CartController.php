<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->has('cart')? session()->get('cart') : [];

        return view('cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $product = $request->get('product');
     //verificar se tem seção para os produtos 
     
        if(session()->has('cart')) {
            //existindo eu adicioo a seção  existente
            session()->push('cart', $product);
        } else {
            //nao existindo eu crio uma seão 
            $products[] = $product;

            session()->put('cart', $products);
        }
     
        flash('Produto Adicionado no carriho!')->success();
        return redirect()->route('product.single', ['slug' => $product ['slug']]);
    }
    public function remove($slug) 
    {
        if(!session()->has('cart'))
            return redirect()->route('cart.index');

        $products = session()->get('cart');

        $products = array_filter($products, function($line) use($slug){
            return $line['slug'] != $slug;
        });
            
        session()->put('cart', $products);
        return redirect()->route('cart.index');
    }
}