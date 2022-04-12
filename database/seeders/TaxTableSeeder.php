<?php

namespace Database\Seeders;

use App\Models\Tax;
use Illuminate\Database\Seeder;

class TaxTableSeeder extends Seeder
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
                'origin_code'     =>  '1',
                'destiny_code'    =>  '2',
                'price'           =>  '1.90'
            ],
            [
                'origin_code'     =>  '2',
                'destiny_code'    =>  '1',
                'price'           =>  '2.90'
            ],
            [
                'origin_code'     =>  '1',
                'destiny_code'    =>  '3',
                'price'           =>  '1.70'
            ],
            [
                'origin_code'     =>  '3',
                'destiny_code'    =>  '1',
                'price'           =>  '2.70'
            ],
            [
                'origin_code'     =>  '1',
                'destiny_code'    =>  '4',
                'price'           =>  '0.90'
            ],
            [
                'origin_code'     =>  '4',
                'destiny_code'    =>  '1',
                'price'           =>  '1.90'
            ]
        );

        Tax::insert($data);
    }
}
