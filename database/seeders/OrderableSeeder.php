<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Combo;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderable_type = collect([Product::class, Combo::class])->random();
        $orderable = $orderable_type::find(collect([1, 2, 3, 4, 5])->random());
        $qty = collect([2, 3, 5, 4, 10])->random();
        $cart_id = Cart::all()->random()->id;
        var_dump($cart_id);

        DB::table('orderables')->insert([
            'cart_id' => $cart_id,
            'orderable_type' => $orderable_type,
            'orderable_id' => $orderable->id,
            'quantity' => $qty,
            'price' => $orderable->price * $qty,
        ]);
    }
}
