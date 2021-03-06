<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            DB::table('faqs')->insert([
                'question' => "Question " . ($i+1),
                'answer'   => "This is the answer number " . ($i+1)
            ]);
        }
    }
}
