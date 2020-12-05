<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    protected $rules = [
        'title' => 'required|min:6|max:255',
        'excerpt' => 'required',
        'price' => 'required|numeric|between:1,1000000',
        'image' => 'image',
        'body' => 'required',
    ];

    protected $messages = [
        'required' => 'Поле «:attribute» обязательно для заполнения',
        'min' => 'Поле «:attribute» должно быть не меньше :min символов',
        'max' => 'Поле «:attribute» должно быть не больше :max символов',
        'numeric' => 'Поле «:attribute» должно быть числом',
        'between.min' => 'Поле «:attribute» должно быть не меньше :min',
        'between.max' => 'Поле «:attribute» должно быть не больше :max',
        'image' => 'Поле «:attribute» должно быть изображением',
    ];

    protected  $attributes = [
        'title' => 'Заголовок',
        'excerpt' => 'Краткое описание',
        'body' => 'Текст',
        'price' => 'Цена',
        'image' => 'Изображение',
    ];

    public function home(){
        return view('product.home');
    }

    public function index($title){
        $title = __($title);
        $category = Category::query()->where('title', $title)->firstOrFail();
        return view('product.index', compact('category'));
    }

    public function show($id){
        $product = Product::query()->findOrFail($id);
        return view('product.show', compact('product'));
    }

    public function validateProduct(Request $request){
        $validator = Validator::make($request->all(), $this->rules, $this->messages, $this->attributes);
        if ($validator->fails()){
            return response()->json($validator->errors());
        }
        else{
            return response()->json([]);
        }
    }

    public function store(Request $request){
        $product = new Product();
        $product->user_id = 2;
        $product->category_id = (int)$request->input('category');
        $product->brand_id = (int)$request->input('brand');
        $product->title = $request->input('title');
        $product->excerpt = $request->input('excerpt');
        $product->price = $request->input('price');
        $product->text = $request->input('body');
        $image = $request->file('image');
        $product->img = $image;
        if ($image) {
            $path = Storage::putFile('public/products', $image);
            $product->img = Storage::url($path);
        }
        $product->created_at = date('Y-m-d H:i:s');
        $product->save();
        $request->session()->flash('success', 'Новая запись успешно добавлена!');
    }

    public function create(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('product.create', compact('categories', 'brands'));
    }

    public function edit($id){
        $product = Product::query()->findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('product.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, $id){
        $product = Product::query()->findOrFail($id);
        $product->user_id = 2;
        $product->category_id = (int)$request->input('category');
        $product->brand_id = (int)$request->input('brand');
        $product->title = $request->input('title');
        $product->excerpt = $request->input('excerpt');
        $product->price = $request->input('price');
        $product->text = $request->input('body');
        if ($request->input('remove')){
            if ($product->img){
                if (file_exists(public_path($product->img))){
                    unlink(public_path($product->img));
                }
            }
            $product->img = null;
        }
        $image = $request->file('image');
        if ($image) {
            $path = Storage::putFile('public/products', $image);
            $product->img = Storage::url($path);
        }
        $product->updated_at = date('Y-m-d H:i:s');
        $product->update();
        $request->session()->flash('success', 'Запись успешно обновлена!');
    }

    public function destroy($id){
        $product = Product::query()->findOrFail($id);
        if ($product->img){
            if (file_exists(public_path($product->img))){
                unlink(public_path($product->img));
            }
        }
        $product->delete();
        return redirect()
            ->route('products.index')
            ->with('success', 'Запись была успешно удалена!');
    }

    public function search(Request $request){
        $search = $request->input('search', '');
        $search = iconv_substr($search, 0, 64);
        $search = preg_replace('#[^0-9a-zA-ZА-Яа-яёЁ]#u', ' ', $search);
        $search = preg_replace('#\s+#u', ' ', $search);
        if (empty($search)) {
            return view('product.search');
        }
        $products = Product::query()->select('products.*', 'users.name as author')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->where('products.title', 'like', '%'.$search.'%')
            ->orWhere('products.text', 'like', '%'.$search.'%')
            ->orWhere('products.excerpt', 'like', '%'.$search.'%')
            ->orWhere('products.price', 'like', '%'.$search.'%')
            ->orWhere('users.name', 'like', '%'.$search.'%')
            ->orderBy('products.created_at', 'desc')
            ->paginate(4)
            ->appends(['search' => $request->input('search')]);
        return view('product.search', compact('products'));
    }

}
