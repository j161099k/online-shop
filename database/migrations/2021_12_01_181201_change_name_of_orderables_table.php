<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNameOfOrderablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orderables', function (Blueprint $table) {
            $table->renameColumn('orderable_id', 'cartable_id');
            $table->renameColumn('orderable_type', 'cartable_type');
            $table->renameIndex('orderables_cart_id_foreign', 'cartables_cart_id_foreign');

            $table->rename('cartables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cartables', function (Blueprint $table) {
            $table->renameColumn('cartable_type', 'orderable_type');
            $table->renameColumn('cartable_id', 'orderable_id');
            $table->renameIndex('cartables_cart_id_foreign', 'orderables_cart_id_foreign');

            $table->rename('orderables');
        });
    }
}
