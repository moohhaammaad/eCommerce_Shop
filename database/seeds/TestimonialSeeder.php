<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('testimonials')->insert([
                'content' => "This is the best website ever " . ($i+1),
                'writer_name'   => Str::random(10) ,
                'writer_job'   => 'Developer' . ($i+1)
            ]);
        }
    }
}
