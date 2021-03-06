<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('products')->insert([
                'name' => "Product " . ($i+1),
                'description'   => "This is the description of the product " . ($i+1),
                'category_id'   => rand(1, 5),
                'price'   => rand(10, 100),
                'image'   => rand(1, 10) . '.png',
            ]);
        }
    }
}
