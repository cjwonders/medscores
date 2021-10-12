<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ScoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1; 
        while ($i <= 5){
            DB::table('scores')->insert([
                'response1' => rand(1,3),
                'response2' => rand(1,3),
                'response3' => rand(1,3),
                'response4' => rand(1,3),
                'response5' => rand(1,3),
            ]);
            $i++;
        }
    }
}
