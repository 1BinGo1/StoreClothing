<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class BasketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $basket = Basket::query()->where('user_id', auth()->id())->first();
        return view('basket.index', compact('basket'));
    }

    public function add(Request $request, $id){
        $basket = Basket::query()->where('user_id', auth()->id())->first();
        $quantity = (int)($request->input('quantity') ?? 1);
        if (empty($basket)){
            $basket = new Basket();
            $basket->user_id = auth()->id();
            $basket->save();
        }
        $pivot = $basket->products()->where('basket_id', $basket->id)->where('product_id', $id)->first();
        if (empty($pivot)){
            $basket->products()->attach($id, ['quantity' => $quantity]);
        }
        else{
            $pivot = $pivot->pivot;
            $quantity = $pivot->quantity + $quantity;
            $pivot->update(['quantity' => $quantity]);
        }
        return redirect()->route('products.home');
    }

    public function plus(Request $request, $id){
        Basket::change($id, 1);
        return redirect()->route('basket.index');
    }

    public function minus(Request $request, $id){
        Basket::change($id, -1);
        return redirect()->route('basket.index');
    }

    public function clear(Request $request, $id){
        Basket::remove($id);
        return redirect()->route('basket.index');
    }

}
