<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MakeUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=0;$i<100;$i++)
        {

        DB::table('make_up')->insert([
            'merek' => $faker->sentence(1),
            'kategori' => $faker->sentence(),
            'warna' => $faker->sentence(),
        ]);
        }
    }
}
