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
}
