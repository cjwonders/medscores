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
                'month' => rand(1,12),
                'question1' => rand(180,200),
                'question2' => rand(290,300),
                'question3' => rand(180,200),
                'question4' => rand(450,500),
                'question5' => rand(180,200),
                'question6' => rand(90,100),
                'question7' => rand(90,100),
                'question8' => rand(90,100),
                'question9' => rand(90,100),
                'question10' => rand(90,100),
                'question11' => rand(90,100),
                'question12' => rand(90,100),
                'question13' => rand(90,100),
                'question14' => rand(90,100),
                'question15' => rand(90,100),
                'question16' => rand(90,100),
                'question17' => rand(90,100),
                'question18' => rand(90,100),
                'question19' => rand(480,500),
                'question20' => rand(90,100),
                'question21' => rand(180,200),
                'question22' => rand(90,100),
                'question23' => rand(90,100),
            ]);
            $i++;
        }
    }
}
