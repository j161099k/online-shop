<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\IngredientController;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function providers()
    {
        return view('admin.providers');
    }

    public function ingredients()
    {
        return view('admin.ingredients');
    }

    public function orders()
    {
        return view('admin.orders');
    }

    public function products()
    {
        return view('admin.products');
    }

    public function combos()
    {
        return view('admin.combos');
    }
}
