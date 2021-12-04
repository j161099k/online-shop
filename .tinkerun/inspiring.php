<?php
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

// DB::beginTransaction();

// User::find(1)->cart->products()->attach(1, ['quantity' => 10, 'price' => 2000 ]);
// User::find(1)->cart->combos()->attach(1, ['quantity' => 15, 'price' => 2500]);

// User::find(1)->cart->products()->attach(2, ['quantity' => 12, 'price' => 3500]);

// dump(User::find(1)->cart()->with('products', 'combos')->first());

// DB::rollBack();

dd(User::find(1)->hasCart());