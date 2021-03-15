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
        App\User::create([
            'f_name' => 'Victor ',
            'l_name' => 'Ukam',
            'o_name' => '',
            'slug' => 'victor-ukam',
			'email' => 'victor.ukam@nueoffshore.com',
			'password' => bcrypt('secret'),
            'role' => 1,
            'category_id' => '6',
            'position_id' => '72',
            'department_id' => '15',
            
		]);
    }
}
