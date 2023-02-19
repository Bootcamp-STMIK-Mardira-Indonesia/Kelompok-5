<?php

namespace App\Database\Seeders;

use App\Core\Seeder;
use App\Core\QueryBuilder as DB;

class ZakatSeeder extends Seeder
{
    public function run()
    {
        DB::table('zakats')->insert(
            [
                [
                    'name' => 'Zakat Fitrah',
                    'description' => 'ZakatFitrah'
                ],
                [
                    'name' => 'Zakat Mal',
                    'description' => 'ZakatMal'
                ],
                [
                    'name' => 'Zakat Profesi',
                    'description' => 'ZakatProfesi'
                ]
            ]
        );
    }
}