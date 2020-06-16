<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_pays', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id')->unsigned();
            $table->integer('shop_id')->unsigned();
            $table->integer('amount')->default(0);
            $table->text('desc');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_pays');
    }
}
