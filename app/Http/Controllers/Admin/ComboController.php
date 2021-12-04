<?php

namespace App\Http\Controllers\Admin;

use App\Models\Combo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ComboController extends Controller
{
    /**
     * Display the main controller view
     * 
     * @return \Illuminate\Http\Response
     */
    public function load()
    {
        return view('admin.combos.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $combos = Combo::with('products:id,name')->select('id', 'name', 'description', 'stock', 'price', 'updated_at');
        return datatables()->eloquent($combos)->rawColumns(['actions'])->addColumn('actions', 'components.button.actions-with-view')->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $combo = new Combo;
        $combo->name = $request->name;
        $combo->description = $request->description;
        $combo->stock = $request->stock;
        $combo->price = $request->price;

        $combo->save();

        return $combo;
    }

    /**
     * Retrieve all of the Combo's products
     * 
     * @param \App\Models\Combo $combo
     * @return \Illuminate\Http\Response
     */
    public function getProducts(Combo $combo)
    {
        return datatables(
            $combo->products()
                ->select('products.id', 'products.name', 'combo_product.quantity')
                ->latest()
                ->limit(5)
        )->rawColumns(['actions'])
        ->addColumn('actions', 'components.button.unlink-action')
        ->toJson();       
    }

    /**
     * Relate Products with a Combo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Combo $combo
     * @return \Illuminate\Http\Response
     */
    public function addProducts(Request $request, Combo $combo)
    {
        $products = collect($request->products)->pluck('quantity', 'id')
            ->map(function ($quantity) {
                return ['quantity' => $quantity];
            })->toArray();

        $combo->products()->syncWithoutDetaching($products);

        return datatables(
            $combo->products()
                ->select('products.id', 'products.name', 'combo_product.quantity')
                ->latest()
                ->limit(5)
        )->rawColumns(['actions'])
            ->addColumn('actions', 'components.button.unlink-action')
            ->toJson();
    }

    /**
     * Unlink Products from a Combo.
     *
     * @param  \App\Models\Combo $combo
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function unlinkProduct(Combo $combo, Product $product)
    {
        return $combo->products()->detach($product->id) ? 'deleted' : 'not deleted';
    }


    /**
     * Display the edit form for a resource.
     *
     * @param  \App\Models\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function edit(Combo $combo)
    {
        $combo = $this->show($combo);
        $categories = Category::with('products:id,category_id,name')->get();
        return view('admin.combos.edit', compact('combo', 'categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function show(Combo $combo)
    {
        return $combo->load('products:id,category_id,name');
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
        $combo->delete() ? 'Deleted!!' : 'Not deleted';
    }
}
