<?php

namespace App\Database\Seeders;

use App\Core\Seeder;
use App\Core\QueryBuilder as DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'no_telp' => '081234567890',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'role_id' => 1,
            ],
            [
                'name' => 'User',
                'no_telp' => '081234567890',
                'username' => 'user',
                'password' => password_hash('user', PASSWORD_DEFAULT),
                'role_id' => 2,
            ]
        ];
        DB::table('users')->insert($data);
    }
}
