<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 40)->create();

        $products = Product::all();
        $categories = Category::all();
        foreach ($categories as $category) {
            $cont = 0;
            foreach ($products as $key => $product) { 
                $category->products()->attach($product);
                $products->forget($key);
                if($cont==3)
                    break;
                $cont++;
            }
        }
    }
}
