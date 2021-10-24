<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return User::find(Auth::user()->id)->load('addresses.orders')->simplePaginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       return DB::transaction(function () use($request) {
            $order = new Order;
            $order->address_id = $request->address_id;
            $order->details = $request->details;

            $unsetId = function($items) {
                unset($items['id']);
                $items['price'] *= $items['quantity'];
                return $items;
            };

            $products = collect($request->products)->keyBy('id')->map($unsetId);
            $combos = collect($request->combos)->keyBy('id')->map($unsetId);

            // dd($products, $combos);

            $order->total = $products->sum('price') + $combos->sum('price');

            $order->save();

            $order->products()->sync($products);
            $order->combos()->sync($combos);

            return $order->load('products:name', 'combos:name');
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return $order->load('products:name', 'combos:name');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete()? 'Deleted!!' : 'Not deleted';
    }
}
