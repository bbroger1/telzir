<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'plan'     =>  'FaleMais 30',
                'minutes'    =>  '30'
            ],
            [
                'plan'     =>  'FaleMais 60',
                'minutes'    =>  '60'
            ],
            [
                'plan'     =>  'FaleMais 120',
                'minutes'    =>  '120'
            ],
        );

        Plan::insert($data);
    }
}
