<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 4; $i++) {
            DB::table('teams')->insert([
                'name' => "Employee " . ($i+1),
                'image'   => "t" .  ($i+1) . '.jpg' ,
                'facebook'   => 'http://www.facebook.com',
                'twitter'   => 'http://www.twitter.com',
                'google'   => 'http://www.google.com',
                'description'   => 'This is the description of the member number '.  ($i+1),
                'position'   => Str::random(5) 
            ]);
        }
    }
}
