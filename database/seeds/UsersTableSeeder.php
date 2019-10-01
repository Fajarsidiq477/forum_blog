<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker ;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('id_ID') ;

        for ($i=0; $i < 100 ; $i++) { 

            DB::table('users')->insert([
                'name' => $faker->name ,
                'username' => $faker->name,
                'level' => '0',
                'email' => $faker->email ,
                'password' => bcrypt('Bismillah'),
                'remember_token' => csrf_token()
            ]) ;

        }
    }
}
