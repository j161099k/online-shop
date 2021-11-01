<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display the main controller view
     * 
     * @return \Illuminate\Http\Response
     */
    public function load()
    {
        return view('admin.orders');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('products:id,name', 
        'combos:id,name', 
        'address:id,street')->with(['address.addressable'=> function(MorphTo $morphTo) {
            $morphTo->morphWith([
                User::class => ['addressable:id, name'],
            ]);
        }]);

        return $orders->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return $order->load(['products', 'combos']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->delivered = $request->delivered;
        $order->save();
        return $order->load(['products', 'combos']);
    }
}
