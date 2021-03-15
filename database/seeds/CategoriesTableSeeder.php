<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::create([
			'name' => 'Crew - NUE Defender',
            'slug' => 'crew-nue-defender',
		]);
		App\Category::create([
			'name' => 'Crew - SVS Guardsman',
            'slug' => 'crew-svs-guardsman',
		]);
		App\Category::create([
			'name' => 'Crew - NUE Defender I',
            'slug' => 'crew-nue-defender-i',
		]);
        App\Category::create([
            'name' => 'Crew - NUE Swift',
            'slug' => 'crew-nue-swift',
        ]);
        App\Category::create([
            'name' => 'Crew - NUE Strider',
            'slug' => 'crew-nue-strider',
        ]);
		App\Category::create([
			'name' => 'Staff',
            'slug' => 'staff',
        ]);
        App\Category::create([
            'name' => 'Crew - NUE Lince',
            'slug' => 'crew-nue-lince',
        ]);
    }
}
