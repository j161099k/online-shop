<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Combo;
use App\Models\Order;
use App\Models\Address;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        $users = User::factory(10)->create();
        $providers = Provider::factory(5)->create();

        $addressable = DB::table('addressables');

        Address::factory(15)->create()->each(function ($address) use($users, $providers, $addressable) {
            if($addressable->count() < $users->count()) {
                $addressable->insert([
                    'addressable_id' => $users->shift()->id,
                    'addressable_type' => 'App\Models\User',
                    'address_id' => $address->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]); 
            }
            else if($providers->count() > 0) {
                $addressable->insert([
                    'addressable_id' => $providers->shift()->id,
                    'addressable_type' => 'App\Models\Provider',
                    'address_id' => $address->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

        });

        Ingredient::factory(45)->create();

        $products = Product::factory(185)->create();
        $combo_product = DB::table('combo_product');
        $combos = Combo::factory(25)->create();
        
        $combos->each(function($combo) use ($products, $combo_product) {
            $combo_product->insert([
                'combo_id' => $combo->id,
                'product_id' => $products->shift()->id,
                'quantity' => random_int(1, 5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        });

        $orderable = DB::table('orderables');

        Order::factory(5)->create()->each(function($order) use ($orderable, $products) {
            $currentProd = $products->shift();
            $qty = random_int(1, 10);

            $orderable->insert([
                'orderable_id' => $currentProd->id,
                'orderable_type' => 'App\Models\Product',
                'order_id' => $order->id,
                'quantity' => $qty,
                'price' => $qty * $currentProd->price,
            ]);
        });
    }

    public function truncateAll($except = [])
    {
      $tables = DB::select('SELECT 
                                TABLE_NAME 
                            FROM 
                                information_schema.tables 
                            WHERE 
                                TABLE_SCHEMA = ?
                                AND 
                                TABLE_NAME != "migrations"', 
      [env('DB_DATABASE')]);
        
      DB::statement('SET FOREIGN_KEY_CHECKS = 0');

      foreach ($tables as $table)
      {
          if(in_array($table->TABLE_NAME, $except))
          {
            continue;
          }

          DB::table($table->TABLE_NAME)->truncate();
      }

      DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
