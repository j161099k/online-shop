<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $combos = Combo::simplePaginate(24);
        $products = Product::paginate(24);
        return view('public.index', compact('combos', 'products'));
    }

    public function showProduct(Product $product)
    {
        return view('public.product', compact('product'));
    }
}
