<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::all();
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        $sections = Section::all();
        return view('office.index', compact('users', 'products', 'categories', 'brands', 'sections'));
    }

    public function create_user(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users|min:5|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:3|max:255',
        ], [
            'required' => 'Поле «:attribute» обязательно для заполнения',
            'min' => 'Поле «:attribute» должно быть не меньше :min символов',
            'max' => 'Поле «:attribute» должно быть не больше :max символов',
            'unique' => 'Поле «:attribute» должно быть уникальным',
            'email' => 'Поле «:attribute» типа email должно быть корректным'
        ], [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password'
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors());
        }
        else{
            $user = new User();
            $user->role_id = (int)$request->input('role');
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();
            //$request->session()->flash('success', 'Новый пользователь успешно создан!');
            return response()->json([]);
        }
    }

    public function create_product(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3|max:255',
            'excerpt' => 'required',
            'price' => 'required|numeric|between:1,1000000',
            'image' => 'image',
            'body' => 'required',
        ], [
            'required' => 'Поле «:attribute» обязательно для заполнения',
            'min' => 'Поле «:attribute» должно быть не меньше :min символов',
            'max' => 'Поле «:attribute» должно быть не больше :max символов',
            'numeric' => 'Поле «:attribute» должно быть числом',
            'between.min' => 'Поле «:attribute» должно быть не меньше :min',
            'between.max' => 'Поле «:attribute» должно быть не больше :max',
            'image' => 'Поле «:attribute» должно быть изображением',
        ], [
            'title' => 'Заголовок',
            'excerpt' => 'Краткое описание',
            'body' => 'Текст',
            'price' => 'Цена',
            'image' => 'Изображение',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors());
        }
        else{
            $product = new Product();
            $product->user_id = auth()->id();
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
            return response()->json([]);
        }
    }

    public function create_section(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
        ], [
            'required' => 'Поле «:attribute» обязательно для заполнения',
            'min' => 'Поле «:attribute» должно быть не меньше :min символов',
            'max' => 'Поле «:attribute» должно быть не больше :max символов',
        ], [
            'name' => 'Name',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors());
        }
        else{
            $section = new Section();
            $section->name = $request->input('name');
            $section->save();
            return response()->json([]);
        }
    }

    public function create_category(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
        ], [
            'required' => 'Поле «:attribute» обязательно для заполнения',
            'min' => 'Поле «:attribute» должно быть не меньше :min символов',
            'max' => 'Поле «:attribute» должно быть не больше :max символов',
        ], [
            'name' => 'Name',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors());
        }
        else{
            $category = new Category();
            $category->section_id = (int)$request->input('section');
            $category->title = $request->input('name');
            $category->save();
            return response()->json([]);
        }
    }

    public function create_brand(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'image' => 'image',
        ], [
            'required' => 'Поле «:attribute» обязательно для заполнения',
            'min' => 'Поле «:attribute» должно быть не меньше :min символов',
            'max' => 'Поле «:attribute» должно быть не больше :max символов',
            'image' => 'Поле «:attribute» должно быть изображением',
        ], [
            'name' => 'Name',
            'image' => 'Изображение',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors());
        }
        else{
            $brand = new Brand();
            $brand->title = $request->input('name');
            $image = $request->file('logotype');
            $brand->img = $image;
            if ($image) {
                $path = Storage::putFile('public/brands', $image);
                $brand->img = Storage::url($path);
            }
            $brand->save();
            return response()->json([]);
        }
    }

    public function destroy($name,$id){
        $class = 'App\\Models\\' . ucfirst($name);
        $item = $class::query()->findOrFail($id);
        if ($item->img){
            if (file_exists(public_path($item->img))){
                unlink(public_path($item->img));
            }
        }
        $item->delete();
        return redirect()
            ->route('office.index')
            ->with('success', 'Запись была успешно удалена!');
    }

}
