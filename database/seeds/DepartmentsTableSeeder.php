<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Department::create([
            'name' => 'Crew Member - NUE Defender',
            'category_id' => 1
        ]);
        App\Department::create([
            'name' => 'Crew Member - SVS Guardsman',
            'category_id' => 2
        ]);
        App\Department::create([
            'name' => 'Crew Member - NUE Defender I',
            'category_id' => 3
        ]);
        App\Department::create([
            'name' => 'Crew Member - NUE Swift',
            'category_id' => 4
        ]);
        App\Department::create([
            'name' => 'Crew Member - NUE Strider',
            'category_id' => 5
        ]);
        
        App\Department::create([
            'name' => 'Accounts Department',
            'category_id' => 6
        ]);
        App\Department::create([
            'name' => 'Admin',
            'category_id' => 6
        ]);
        App\Department::create([
            'name' => 'Business Development Department',
            'category_id' => 6
        ]);
        App\Department::create([
            'name' => 'Chartering Department',
            'category_id' => 6
        ]);
        App\Department::create([
            'name' => 'Facility Management Department',
            'category_id' => 6
        ]);
        App\Department::create([
            'name' => 'Legal/Document Control Department',
            'category_id' => 6
        ]);
        App\Department::create([
            'name' => 'Marine Operations Department',
            'category_id' => 6
        ]);
        App\Department::create([
            'name' => 'HR Department',
            'category_id' => 6
        ]); 
        App\Department::create([
            'name' => 'HSE Deprtment',
            'category_id' => 6
        ]);      
        App\Department::create([
            'name' => 'IT Department',
            'category_id' => 6
        ]);
        App\Department::create([
            'name' => 'Procurement Department',
            'category_id' => 6
        ]);

        App\Department::create([
            'name' => 'Crew Member - NUE Lince',
            'category_id' => 7
        ]);
        
    }
}
