<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/** Defender Positions **/
        App\Position::create([
			'name' => 'Master',
            'slug' => 'master',
            'department_id' => '1'
		]);
		App\Position::create([
			'name' => 'Chief Mate',
            'slug' => 'chief-mate',
            'department_id' => '1'
		]);
        App\Position::create([
			'name' => 'Chief Engineer',
            'slug' => 'chief-engineer',
            'department_id' => '1'
		]);
		App\Position::create([
			'name' => 'Second Engineer',
            'slug' => 'second-engineer',
            'department_id' => '1'
		]);
		App\Position::create([
			'name' => 'Cook',
            'slug' => 'cook',
            'department_id' => '1'
		]);
		App\Position::create([
			'name' => 'E.T.O',
            'slug' => 'e-t-o',
            'department_id' => '1'
		]);
		App\Position::create([
			'name' => 'Cadet',
            'slug' => 'cadet',
            'department_id' => '1'
		]);
        App\Position::create([
			'name' => 'A/B',
            'slug' => 'a-b',
            'department_id' => '1'
		]);
		App\Position::create([
			'name' => 'Oiler',
            'slug' => 'oiler',
            'department_id' => '1'
		]);
        App\Position::create([
			'name' => 'Chief Officer',
            'slug' => 'chief-officer',
            'department_id' => '1'
		]);
		App\Position::create([
			'name' => 'Able Seaman',
            'slug' => 'able-seaman',
            'department_id' => '1'
		]);
		App\Position::create([
			'name' => 'Electrician',
            'slug' => 'electrician',
            'department_id' => '1'
		]);
		App\Position::create([
			'name' => 'Rating forming part of Engine watch',
            'slug' => 'rating-forming-part-of-engine-watch',
            'department_id' => '1'
		]);
		

		/** Guardsman Positions **/
        App\Position::create([
			'name' => 'Master',
            'slug' => 'master',
            'department_id' => '2'
		]);
		App\Position::create([
			'name' => 'Chief Mate',
            'slug' => 'chief-mate',
            'department_id' => '2'
		]);
        App\Position::create([
			'name' => 'Chief Engineer',
            'slug' => 'chief-engineer',
            'department_id' => '2'
		]);
		App\Position::create([
			'name' => 'Second Engineer',
            'slug' => 'second-engineer',
            'department_id' => '2'
		]);
		App\Position::create([
			'name' => 'Cook',
            'slug' => 'cook',
            'department_id' => '2'
		]);
		App\Position::create([
			'name' => 'E.T.O',
            'slug' => 'e-t-o',
            'department_id' => '2'
		]);
		App\Position::create([
			'name' => 'Cadet',
            'slug' => 'cadet',
            'department_id' => '2'
		]);
        App\Position::create([
			'name' => 'A/B',
            'slug' => 'a-b',
            'department_id' => '2'
		]);
		App\Position::create([
			'name' => 'Oiler',
            'slug' => 'oiler',
            'department_id' => '2'
		]);
        App\Position::create([
			'name' => 'Chief Officer',
            'slug' => 'chief-officer',
            'department_id' => '2'
		]);
		App\Position::create([
			'name' => 'Able Seaman',
            'slug' => 'able-seaman',
            'department_id' => '2'
		]);
		App\Position::create([
			'name' => 'Electrician',
            'slug' => 'electrician',
            'department_id' => '2'
		]);
		App\Position::create([
			'name' => 'Rating forming part of Engine watch',
            'slug' => 'rating-forming-part-of-engine-watch',
            'department_id' => '2'
		]);

		/** Defender I Positions **/
        App\Position::create([
			'name' => 'Master',
            'slug' => 'master',
            'department_id' => '3'
		]);
		App\Position::create([
			'name' => 'Chief Mate',
            'slug' => 'chief-mate',
            'department_id' => '3'
		]);
        App\Position::create([
			'name' => 'Chief Engineer',
            'slug' => 'chief-engineer',
            'department_id' => '3'
		]);
		App\Position::create([
			'name' => 'Second Engineer',
            'slug' => 'second-engineer',
            'department_id' => '3'
		]);
		App\Position::create([
			'name' => 'Cook',
            'slug' => 'cook',
            'department_id' => '3'
		]);
		App\Position::create([
			'name' => 'E.T.O',
            'slug' => 'e-t-o',
            'department_id' => '3'
		]);
		App\Position::create([
			'name' => 'Cadet',
            'slug' => 'cadet',
            'department_id' => '3'
		]);
        App\Position::create([
			'name' => 'A/B',
            'slug' => 'a-b',
            'department_id' => '3'
		]);
		App\Position::create([
			'name' => 'Oiler',
            'slug' => 'oiler',
            'department_id' => '3'
		]);
        App\Position::create([
			'name' => 'Chief Officer',
            'slug' => 'chief-officer',
            'department_id' => '3'
		]);
		App\Position::create([
			'name' => 'Able Seaman',
            'slug' => 'able-seaman',
            'department_id' => '3'
		]);
		App\Position::create([
			'name' => 'Electrician',
            'slug' => 'electrician',
            'department_id' => '3'
		]);
		App\Position::create([
			'name' => 'Rating forming part of Engine watch',
            'slug' => 'rating-forming-part-of-engine-watch',
            'department_id' => '3'
		]);

		/** Swift Positions **/
        App\Position::create([
			'name' => 'Master',
            'slug' => 'master',
            'department_id' => '4'
		]);
		App\Position::create([
			'name' => 'Chief Mate',
            'slug' => 'chief-mate',
            'department_id' => '4'
		]);
		App\Position::create([
			'name' => 'Second Engineer',
            'slug' => 'second-engineer',
            'department_id' => '4'
		]);
        App\Position::create([
			'name' => 'Chief Engineer',
            'slug' => 'chief-engineer',
            'department_id' => '4'
		]);
		App\Position::create([
			'name' => 'Cook',
            'slug' => 'cook',
            'department_id' => '4'
		]);
		App\Position::create([
			'name' => 'E.T.O',
            'slug' => 'e-t-o',
            'department_id' => '4'
		]);
		App\Position::create([
			'name' => 'Cadet',
            'slug' => 'cadet',
            'department_id' => '4'
		]);
        App\Position::create([
			'name' => 'A/B',
            'slug' => 'a-b',
            'department_id' => '4'
		]);
		App\Position::create([
			'name' => 'Oiler',
            'slug' => 'oiler',
            'department_id' => '4'
		]);
        App\Position::create([
			'name' => 'Chief Officer',
            'slug' => 'chief-officer',
            'department_id' => '4'
		]);
		App\Position::create([
			'name' => 'Able Seaman',
            'slug' => 'able-seaman',
            'department_id' => '4'
		]);
		App\Position::create([
			'name' => 'Electrician',
            'slug' => 'electrician',
            'department_id' => '4'
		]);
		App\Position::create([
			'name' => 'Rating forming part of Engine watch',
            'slug' => 'rating-forming-part-of-engine-watch',
            'department_id' => '4'
        ]);
        
        /** Strider Positions **/
        App\Position::create([
			'name' => 'Master',
            'slug' => 'master',
            'department_id' => '5'
		]);
		App\Position::create([
			'name' => 'Chief Mate',
            'slug' => 'chief-mate',
            'department_id' => '5'
		]);
		App\Position::create([
			'name' => 'Second Engineer',
            'slug' => 'second-engineer',
            'department_id' => '5'
		]);
        App\Position::create([
			'name' => 'Chief Engineer',
            'slug' => 'chief-engineer',
            'department_id' => '5'
		]);
		App\Position::create([
			'name' => 'Cook',
            'slug' => 'cook',
            'department_id' => '5'
		]);
		App\Position::create([
			'name' => 'E.T.O',
            'slug' => 'e-t-o',
            'department_id' => '5'
		]);
		App\Position::create([
			'name' => 'Cadet',
            'slug' => 'cadet',
            'department_id' => '5'
		]);
        App\Position::create([
			'name' => 'A/B',
            'slug' => 'a-b',
            'department_id' => '5'
		]);
		App\Position::create([
			'name' => 'Oiler',
            'slug' => 'oiler',
            'department_id' => '5'
		]);
        App\Position::create([
			'name' => 'Chief Officer',
            'slug' => 'chief-officer',
            'department_id' => '5'
		]);
		App\Position::create([
			'name' => 'Able Seaman',
            'slug' => 'able-seaman',
            'department_id' => '5'
		]);
		App\Position::create([
			'name' => 'Electrician',
            'slug' => 'electrician',
            'department_id' => '5'
		]);
		App\Position::create([
			'name' => 'Rating forming part of Engine watch',
            'slug' => 'rating-forming-part-of-engine-watch',
            'department_id' => '5'
		]);

		/** Lince Positions **/
		App\Position::create([
			'name' => 'Master',
			'slug' => 'master',
			'department_id' => '7'
		]);
		App\Position::create([
			'name' => 'Chief Mate',
			'slug' => 'chief-mate',
			'department_id' => '7'
		]);
		App\Position::create([
			'name' => 'Second Engineer',
			'slug' => 'second-engineer',
			'department_id' => '7'
		]);
		App\Position::create([
			'name' => 'Chief Engineer',
			'slug' => 'chief-engineer',
			'department_id' => '7'
		]);
		App\Position::create([
			'name' => 'Cook',
			'slug' => 'cook',
			'department_id' => '7'
		]);
		App\Position::create([
			'name' => 'E.T.O',
			'slug' => 'e-t-o',
			'department_id' => '7'
		]);
		App\Position::create([
			'name' => 'Cadet',
			'slug' => 'cadet',
			'department_id' => '7'
		]);
		App\Position::create([
			'name' => 'A/B',
			'slug' => 'a-b',
			'department_id' => '7'
		]);
		App\Position::create([
			'name' => 'Oiler',
			'slug' => 'oiler',
			'department_id' => '7'
		]);
		App\Position::create([
			'name' => 'Chief Officer',
			'slug' => 'chief-officer',
			'department_id' => '7'
		]);
		App\Position::create([
			'name' => 'Able Seaman',
			'slug' => 'able-seaman',
			'department_id' => '7'
		]);
		App\Position::create([
			'name' => 'Electrician',
			'slug' => 'electrician',
			'department_id' => '7'
		]);
		App\Position::create([
			'name' => 'Rating forming part of Engine watch',
			'slug' => 'rating-forming-part-of-engine-watch',
			'department_id' => '7'
		]);

		/** Staff Positions **/
        App\Position::create([
			'name' => 'MD/CEO',
            'slug' => 'md-ceo',
            'department_id' => '7'
		]);
		App\Position::create([
			'name' => 'Legal Analyst',
            'slug' => 'legal-analyst',
            'department_id' => '11'
		]);
		App\Position::create([
			'name' => 'Accountant',
            'slug' => 'accountant',
            'department_id' => '6'
		]);
		App\Position::create([
			'name' => 'Accountant Assistant',
            'slug' => 'accountant-assistant',
            'department_id' => '6'
		]);
		App\Position::create([
			'name' => 'Head, Marine Operations',
            'slug' => 'head-marine-operations',
            'department_id' => '12'
		]);
		App\Position::create([
			'name' => 'Marine Operations Assistant',
            'slug' => 'marine-operations-assistant',
            'department_id' => '12'
		]);
		App\Position::create([
			'name' => 'Head, Information Technology',
            'slug' => 'head-information-technology',
            'department_id' => '15'
		]);
		App\Position::create([
			'name' => 'IT Support Assistant',
            'slug' => 'it-support-assistant',
            'department_id' => '15'
		]);
		App\Position::create([
			'name' => 'Head, Business Development',
            'slug' => 'head-business-development',
            'department_id' => '8'
		]);
		App\Position::create([
			'name' => 'Business Development Assistant',
            'slug' => 'business-development-assistant',
            'department_id' => '8'
		]);
		App\Position::create([
			'name' => 'Head, Procurement',
            'slug' => 'head-procurement',
            'department_id' => '16'
		]);
		App\Position::create([
			'name' => 'Procurement Asistant',
            'slug' => 'procurement-assistant',
            'department_id' => '16'
		]);
		App\Position::create([
			'name' => 'Head, Human Resources',
            'slug' => 'head-human-resources',
            'department_id' => '13'
		]);
		App\Position::create([
			'name' => 'Head, HSE',
            'slug' => 'head-hse',
            'department_id' => '14'
		]);
		App\Position::create([
			'name' => 'HSE Assistant',
            'slug' => 'hse-assistant',
            'department_id' => '14'
		]);
		App\Position::create([
			'name' => 'Admin',
            'slug' => 'admin',
            'department_id' => '7'
		]);
		App\Position::create([
			'name' => 'Facility Manager',
            'slug' => 'facility-manager',
            'department_id' => '10'
		]);
		App\Position::create([
			'name' => 'Driver',
            'slug' => 'driver',
            'department_id' => '7'
		]);
    }
}
