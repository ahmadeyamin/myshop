<?php

use Illuminate\Database\Seeder;
use App\Model\Shop;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Shop::class,1)->create();
    }
}
