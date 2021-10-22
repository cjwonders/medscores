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
        while ($i <= 110){
            DB::table('scores')->insert([
                'response1' => rand(180,200),
                'response2' => rand(290,300),
                'response3' => rand(180,200),
                'response4' => rand(450,500),
                'response5' => rand(180,200),
                'response6' => rand(90,100),
                'response7' => rand(90,100),
                'response8' => rand(90,100),
                'response9' => rand(90,100),
                'response10' => rand(90,100),
                'response11' => rand(90,100),
                'response12' => rand(90,100),
                'response13' => rand(90,100),
                'response14' => rand(90,100),
                'response15' => rand(90,100),
                'response16' => rand(90,100),
                'response17' => rand(90,100),
                'response18' => rand(90,100),
                'response19' => rand(480,500),
                'response20' => rand(90,100),
                'response21' => rand(180,200),
                'response22' => rand(90,100),
                'response23' => rand(90,100),
            ]);
            $i++;
        }
    }
}
