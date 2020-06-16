<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('product_id')->nullable()->unsigned();
            $table->string('title')->nullable();
            $table->string('address')->nullable();
            $table->string('discount')->nullable()->default(0);
            $table->string('transport')->nullable()->default(0);
            $table->integer('quantity');
            $table->decimal('rate', 15, 2);
            $table->text('desc')->nullable();
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
