<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('headquaters', function (Blueprint $table){
            $table->foreign('branch_id')->references('id')->on('branches');
        });
        Schema::table('orders', function(Blueprint $table) {
            $table->foreign('headquater_id')->references('id')->on('headquaters');
        });
        Schema::table('suppliers', function(Blueprint $table) {
            $table->foreign('delivery_id')->references('id')->on('deliveries');
        });
        Schema::table('products', function(Blueprint $table) {
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
        Schema::table('deliveries', function(Blueprint $table) {
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
        Schema::table('order_details', function(Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('order_id')->references('id')->on('orders');        });
        Schema::table('order_detail_deliveries', function(Blueprint $table) {
            $table->foreign('delivery_id')->references('id')->on('deliveries');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('order_detail_id')->references('id')->on('order_details');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
