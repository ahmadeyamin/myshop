<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncAndExpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inc_and_exps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->integer('product_id')->nullable()->unsigned();
            $table->string('title')->nullable();
            $table->enum('status',['active','pending','rejected','done'])->default('pending');
            $table->text('desc')->nullable();
            $table->enum('type',['inc','exp']);
            $table->enum('inc_type',['regular','irregular']);
            $table->integer('quantity')->nullable();
            $table->decimal('rate', 15, 2);
            $table->json('data')->nullable();
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
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
        Schema::dropIfExists('inc_and_exps');
    }
}
