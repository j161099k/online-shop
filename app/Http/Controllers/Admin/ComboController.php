<?php

namespace App\Http\Controllers\Admin;

use App\Models\Combo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ComboController extends Controller
{
    /**
     * Display the main controller view
     * 
     * @return \Illuminate\Http\Response
     */
    public function load()
    {
        $categories = \App\Models\Category::all();
        return view('admin.combos', compact('categories'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $combos = Combo::with('products:id,name')->select('id', 'name', 'description', 'stock', 'price', 'updated_at');
        return datatables()->eloquent($combos)->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       return DB::transaction(function() use ($request){
            $combo = new Combo;
            $combo->name = $request->name;
            $combo->description = $request->description;
            $combo->stock = $request->stock;
            $combo->price = $request->price;

            $products = collect($request->products)->pluck('quantity', 'id')
            ->map(function($quantity) {
                return ['quantity' => $quantity];
            })->toArray();

            $combo->save();

            $combo->products()->sync($products);
            return $combo->load('products');
        });     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function show(Combo $combo)
    {
        return $combo->load('products');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Combo $combo)
    {
        return DB::transaction(function () use ($combo, $request) {
            $combo->name = $request->name;
            $combo->description = $request->description;
            $combo->stock = $request->stock;
            $combo->price = $request->price;

            $products = collect($request->products)->pluck('quantity', 'id')
                ->map(function ($quantity) {
                    return ['quantity' => $quantity];
                })->toArray();

            $combo->save();

            $combo->products()->sync($products);
            return $combo->load('products');
        });    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Combo $combo)
    {
        $combo->delete()? 'Deleted!!' : 'Not deleted';
    }
}
