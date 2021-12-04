<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Combo;
use App\Models\Order;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Provider;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateAll();

        $this->call(OneUserSeeder::class);

        $categories = Category::factory(5)->create();

        Product::factory(185)->sequence(
            fn ($sequence) => ['category_id' => $categories->random()]
        )->create();

        Combo::factory(25)->create();

        Cart::factory(10)->create();

        $this->createOrderables(10);

        // $users = User::factory(10)->create();
        // Provider::factory(5)->create();

        // Ingredient::factory(45)->create();


        // $combo_product = DB::table('combo_product');

        // $combos->each(function ($combo) use ($products, $combo_product) {
        //     $combo_product->insert([
        //         'combo_id' => $combo->id,
        //         'product_id' => $products->shift()->id,
        //         'quantity' => random_int(1, 5),
        //     ]);
        // });

        // $orderable = DB::table('orderables');

      
    }

    public function createOrderables($quantity)
    {
        for ($i = 0; $i < $quantity; $i++) {
            $this->call(OrderableSeeder::class);
        }  
    }

    /*     public function createAddresses()
    {

        $addresses = Address::factory(15)->create()->where('addressable_type', 'App\\Models\\User');
        $ordersAddresses = $addresses->map(function ($item, $key) {
            return ['address_id' => $item->id];
        })->toArray();
    }

    public function createOrders($ordersAddresses)
    {
        Order::factory($users->count())->state(new Sequence(...$ordersAddresses))->create()
            ->each(function ($order) use ($orderable, $products) {
                $currentProd = $products->shift();
                $qty = random_int(1, 10);
                $sub = (float) $qty * $currentProd->price;

                $orderable->insert([
                    'orderable_id' => $currentProd->id,
                    'orderable_type' => 'App\\Models\\Product',
                    'order_id' => $order->id,
                    'quantity' => $qty,
                    'price' => $sub,
                ]);

                $order->total += $sub * 1.16;

                $order->save();
            });
    } */

    public function truncateAll($except = [])
    {
        $tables = DB::select('SELECT 
                                TABLE_NAME 
                            FROM 
                                information_schema.tables 
                            WHERE 
                                TABLE_SCHEMA = ?
                                AND 
                                TABLE_NAME != "migrations"', [env('DB_DATABASE')]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        foreach ($tables as $table) {
            if (in_array($table->TABLE_NAME, $except)) {
                continue;
            }

            DB::table($table->TABLE_NAME)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
