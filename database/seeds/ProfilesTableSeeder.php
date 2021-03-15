<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Profile::create([
        	'user_id' => '1',
            'avatar' => 'storage/uploads/employees/1/dp/me_1610016912.jpg',
            'gender' => 'm',
            'start_date' => '2018-11-26',
		]);
    }
}
