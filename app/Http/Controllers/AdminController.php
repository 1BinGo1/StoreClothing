<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.index', compact('users', 'products', 'categories', 'brands', 'sections'));
    }




}
