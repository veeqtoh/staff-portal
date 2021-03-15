<?php

use Illuminate\Database\Seeder;

class PfasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Pfa::create([
			'name' => 'AIICO Pension Managers Limited'
        ]);
        App\Pfa::create([
			'name' => 'APT Pension Fund Managers Limited'
        ]);
        App\Pfa::create([
			'name' => 'ARM Pension Managers Limited'
        ]);
        App\Pfa::create([
			'name' => 'AXA Mansard Pension Limited'
        ]);
        App\Pfa::create([
			'name' => 'CrusaderSterling Pensions Limited'
        ]);
        App\Pfa::create([
			'name' => 'FCMB Pensions Limited'
        ]);
        App\Pfa::create([
			'name' => 'Fidelity Pension Managers'
        ]);
        App\Pfa::create([
			'name' => 'First Guarantee Pension Limited'
        ]);
        App\Pfa::create([
			'name' => 'IEI-Anchor Pension Managers Limited'
        ]);
        App\Pfa::create([
			'name' => 'Investment One Pension Managers Limited'
        ]);
        App\Pfa::create([
			'name' => 'Leadway Pensure PFA Limited'
        ]);
        App\Pfa::create([
			'name' => 'NLPC Pension Fund Administrators Limited'
        ]);
        App\Pfa::create([
			'name' => 'NPF Pensions Limited'
        ]);
        App\Pfa::create([
			'name' => 'OAK Pensions Limited'
        ]);
        App\Pfa::create([
			'name' => 'Pensions Alliance Limited'
        ]);
        App\Pfa::create([
			'name' => 'Premium Pension Limited'
        ]);
        App\Pfa::create([
			'name' => 'Radix Pension Managers Limited'
        ]);
        App\Pfa::create([
			'name' => 'Sigma Pensions Limited'
        ]);
        App\Pfa::create([
			'name' => 'Stanbic IBTC Pension Managers Limited'
        ]);
        App\Pfa::create([
			'name' => 'Veritas Glanvills Pensions Limited'
        ]);
    }
}
