<?php

use App\User;
use App\Model\Shop;
use App\Model\Product;
use App\Model\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,1)->create();
        factory(Shop::class,1)->create();
        factory(Customer::class,25)->create();
        factory(Product::class,14)->create();
    }
}
