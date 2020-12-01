<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function home(){
        return view('product.home');
    }

    public function index(){
        $products = Product::getProducts();
        return view('product.index', compact('products'));
    }

    public function show($id){
        $product = Product::query()->findOrFail($id);
        return view('product.show', compact('product'));
    }

    public function create(Request $request){
        if ($request->isMethod('get')){
            $categories = Category::all();
            $brands = Brand::all();
            return view('admin.index', compact('categories', 'brands'));
        }
        else{
            $product = new Product();
            $product->user_id = 1;
            $category = Category::query()->where('title', $request->input('category'))->firstOrFail();
            $brand = Brand::query()->where('title', $request->input('brand'))->firstOrFail();
            $product->category_id = $category->id;
            $product->brand_id = $brand->id;
            $product->category_id = 1;
            $product->brand_id = 1;
            $product->title = $request->input('title');
            $product->excerpt = $request->input('excerpt');
            $product->price = $request->input('price');
            $product->text = $request->input('body');
            $image = $request->file('image');
            $product->img = $image;
            if ($image) {
                Storage::putFile('public/products', $image);
            }
            $product->created_at = date('Y-m-d H:i:s');
            $product->save();
            return redirect()->route('products.index');
        }
    }

    public function edit(Request $request, $id){
        if ($request->isMethod('get')){
            $product = Product::query()->findOrFail($id);
            $categories = Category::all();
            $brands = Brand::all();
            return view('admin.edit', compact('product', 'categories', 'brands'));
        }
        else{

        }
    }

}
