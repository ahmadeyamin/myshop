<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditdebitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditdebits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->integer('creditdebitable_id');
            $table->string('creditdebitable_type');
            $table->decimal('amount', 15, 2)->default(0);
            $table->enum('type',['inc','dec'])->nullable();
            $table->enum('item_type',['inc','dec'])->nullable();
            $table->decimal('item_count', 15, 3)->nullable()->default(0);
            $table->string('desc')->nullable()->default(null);
            $table->json('data')->nullable();
            $table->timestamps();
            $table->softDeletes();



            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creditdebits');
    }
}
