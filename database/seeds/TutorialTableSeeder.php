<?php

use Illuminate\Database\Seeder;

class TutorialTableSeeder extends Seeder{


    public function run(){

        $faker = Faker\Factory::create();


        foreach(range(1,30) as $index){


            DB::table('tutorials')->insert([
                'title'=> $faker->sentence(30,true),
                'publisher_id' => $faker->numberBetween(10,10000),
                'date' => $faker->date('d-m-Y','now'),
                'tag' => $faker->words(8,true),
                'rate' => $faker->numberBetween(0,10)


            ]);
        }

    }
}