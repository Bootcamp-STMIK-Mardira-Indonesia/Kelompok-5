<?php

namespace App\Database\Seeders;

use App\Core\Seeder;
use App\Core\QueryBuilder as DB;

class ContentSeeder extends Seeder
{
    public function run()
    {
        DB::table('contents')->insert(
            [
                [
                    'judul' => 'Homepage Content',
                    'konten' => 'Sekarang menunaikan zakat tidak perlu lagi keluar rumah, kapanpun dan dimana pun anda berada, Multibenefit Ummat hadir untuk memudahkan ummat untuk menunaikan zakat, mulai dari zakat maal sampai zakat fitrah,
Insyaallah kita amanah dalam penyaluran zakat yang anda tunaikan.
Kita salurkan zakat yang sudah terkumpul ke setiap masjid untuk dikelola kembali kepada saudara-saudara kita yang membutuhkan 
Jazakalloh khair'
                ]
            ]
        );
    }
}