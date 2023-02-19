<?php

namespace App\Database\Seeders;

use App\Core\Seeder;
use App\Core\QueryBuilder as DB;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        DB::table('payments')->insert([
            [
                'user_id' => 2,
                'zakat_id' => 1,
                'bank_account_id' => 1,
                'total_zakat' => 100000,
                'image' => ""
            ],
            [
                'user_id' => 2,
                'zakat_id' => 2,
                'bank_account_id' => 1,
                'total_zakat' => 30000,
                'image' => ""
            ],
            [
                'user_id' => 2,
                'zakat_id' => 3,
                'bank_account_id' => 1,
                'total_zakat' => 80000,
                'image' => ""
            ]
        ]);
    }
}