<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 1000; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10) . ' ' . Str::random(10),
                'email'   => Str::random(10) . '@gmail.com',
                'password'   => Hash::make('password'),
                'address'   => Str::random(10) . ', ' . Str::random(10) . ', ' . 'Egypt',
                'is_newsletters'   => rand(0, 1)

            ]);
        }
    }
}
