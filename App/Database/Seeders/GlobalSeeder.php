<?php

namespace App\Database\Seeders;

use App\Core\Seeder;

class GlobalSeeder extends Seeder
{
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ZakatSeeder::class);
        $this->call(BankAccountSeeder::class);
        $this->call(PartnershipSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(ContentSeeder::class);
        $this->call(PaymentSeeder::class);
    }
}
