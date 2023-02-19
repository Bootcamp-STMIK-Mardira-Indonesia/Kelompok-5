<?php

namespace App\Database\Seeders;

use App\Core\Seeder;
use App\Core\QueryBuilder as DB;

class BankAccountSeeder extends Seeder
{
    public function run()
    {
        $data = DB::table('bank_accounts')->insert(
            [
                [
                    'name' => 'Dana',
                    'id_bank' => '088218316794',
                    'atas_nama' => 'a.n Multibenefit'
                ],
                [
                    'name' => 'ShoppePay',
                    'id_bank' => '088218316794',
                    'atas_nama' => 'a.n Multibenefit'
                ],
                [
                    'name' => 'Mandiri',
                    'id_bank' => '1320023463095',
                    'atas_nama' => 'a.n Multibenefit'
                ],
                [
                    'name' => 'Sea Bank',
                    'id_bank' => '901352597585',
                    'atas_nama' => 'a.n Multibenefit'
                ]
            ]
        );
    }
}