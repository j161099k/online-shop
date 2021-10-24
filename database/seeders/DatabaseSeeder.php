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
use Illuminate\Database\Eloquent\Factories\Sequence;
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
        Provider::factory(5)->create();

        $addresses = Address::factory(15)->create()->where('addressable_type', 'App\\Models\\User');

        Ingredient::factory(45)->create();

        $products = Product::factory(185)->create();
        $combo_product = DB::table('combo_product');
        $combos = Combo::factory(25)->create();
        
        $combos->each(function($combo) use ($products, $combo_product) {
            $combo_product->insert([
                'combo_id' => $combo->id,
                'product_id' => $products->shift()->id,
                'quantity' => random_int(1, 5),
            ]);
        });

        $orderable = DB::table('orderables');

        $ordersAddresses = $addresses->map(function($item, $key){
                                return ['address_id' => $item->id];
                            })->toArray();

        Order::factory($users->count())->state(new Sequence(...$ordersAddresses))->create()
        ->each(function($order) use ($orderable, $products) {
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

            $order->total+= $sub*1.16;

            $order->save();
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
                                TABLE_NAME != "migrations"', [env('DB_DATABASE')]);
        
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
