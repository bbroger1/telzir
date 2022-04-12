<?php

namespace Database\Seeders;

use App\Models\AreaCode;
use Illuminate\Database\Seeder;

class AreaCodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['area_code' => '011'],
            ['area_code' => '016'],
            ['area_code' => '017'],
            ['area_code' => '018']
        );

        AreaCode::insert($data);
    }
}
