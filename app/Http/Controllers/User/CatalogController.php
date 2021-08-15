<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Combo;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
        $products = Product::simplePaginate(30);

        return $products;
    }

    /**
     * Display a listing of the combos.
     *
     * @return \Illuminate\Http\Response
     */
    public function combos()
    {
        $combos = Combo::simplePaginate(30);

        return $combos;
    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProduct($id)
    {
        $product = Product::findOrFail($id);
        return $product;
    }

    /**
     * Display the specified combo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCombo($id)
    {
        $combo = Combo::where('id', $id)->with('products:id,name')->first();

        if(!$combo){
            abort(404);
        }
        
        return $combo;
    }
}
