<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'adress'=>str_random(100),
			'photo'=>str_random(100),
			'gender'=>'M',
			'age'=>1,
			'programmer'=>true,
			'designer'=>false
        ]);
		 DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'adress'=>str_random(100),
			'photo'=>str_random(100),
			'gender'=>'F',
			'age'=>2,
			'programmer'=>false,
			'designer'=>true
        ]);
		
		 DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'adress'=>str_random(100),
			'photo'=>str_random(100),
			'gender'=>'M',
			'age'=>0,
			'programmer'=>true,
			'designer'=>false
        ]);
    }
}
