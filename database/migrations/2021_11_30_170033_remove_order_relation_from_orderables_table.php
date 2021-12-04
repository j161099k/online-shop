<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveOrderRelationFromOrderablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orderables', function (Blueprint $table) {
            $table->dropForeign('orderables_order_id_foreign');
            $table->dropColumn('order_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orderables', function (Blueprint $table) {
            $table->foreignId('order_id')->after('orderable_id')->constrained()->onDelete('cascade');
        });
    }
}
