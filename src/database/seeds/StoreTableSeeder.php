<?php

use Illuminate\Database\Seeder;
use App\Store;
use App\Product;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = Store::all();

        foreach ($stores as $store) {
            // $store->products()->save(factory(Product::class)->make());
            $store->products()->createMany(factory(Product::class, 3)->make()->toArray());
        }
    }
}
