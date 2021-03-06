<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 12; $i++) {
            DB::table('brands')->insert([
                'name' => 'Brand ' . ($i+1) 
            ]);
        }
        
    }
}
