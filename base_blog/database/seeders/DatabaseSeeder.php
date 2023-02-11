<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker=\Faker\Factory::create();
        for ($i=0;$i<10;$i++) {
            DB::table('posts')
                ->insert(['title' => $faker->text(60),
                    'body' => $faker->text(500),
                    'categoryID' => rand(1, 5),
                    'date' => $faker->dateTimeBetween("-3 years")]);
        }

       /* for ($i=0;$i<20;$i++) {
            DB::table('comments')
                ->insert([
                    'name'=>$faker->firstName(),
                    'body'=>$faker->text(150),
                    'postID'=>rand(59,75),
                    'date'=>$faker->dateTimeBetween('-2 month','now')
                ]);
        }*/
    }
}
