<?php

namespace App\Database\Seeders;

use App\Core\Seeder;
use App\Core\QueryBuilder as DB;

class ContactSeeder extends Seeder
{
    public function run()
    {
        DB::table('contacts')->insert(
            [
                'alamat' => 'Jl. Soekarno Hatta Jl. Leuwi Panjang No.211, Situsaeur, Kec. Bojongloa Kidul, Kota Bandung, Jawa Barat 40233',
                'no_telp' => '0882-1831-6794',
                'whatsapp' => '0882-1831-6794',
                'sosial_media' => '@mutibenefitummat'
            ]
        );
    }
}
