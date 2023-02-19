<?php

namespace App\Database\Seeders;

use App\Core\Seeder;
use App\Core\QueryBuilder as DB;

class PartnershipSeeder extends Seeder
{
    public function run()
    {
        DB::table('partnerships')->insert(
            [
                [
                    'name' => 'Masjid Darus Salam',
                    'alamat' => 'Jl. Raya Kopo No.366, RW.01, Kopo, Kec. Bojongloa Kaler, Kota Bandung, Jawa Barat 40233'
                ],
                [
                    'name' => 'Masjid Asy Syarif',
                    'alamat' => 'Jl. Raya Kopo No.366, RT.01, Kopo, Kec. Bojongloa Kaler, Kota Bandung, Jawa Barat 40233'
                ],
                [
                    'name' => 'Masjid Istiqamah Bandung',
                    'alamat' => 'Plaza Istiqamah, Jl. Taman Citarum, Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40115'
                ],
                [
                    'name' => 'Masjid At Taubah',
                    'alamat' => 'Jl. Peta No.209, Suka Asih, Kec. Bojongloa Kaler, Kota Bandung, Jawa Barat 40231'
                ],
                [
                    'name' => 'Masjid Agung Al-Ukhuwwah',
                    'alamat' => 'Jl. Wastukencana No.27, Babakan Ciamis, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40117'
                ],
                [
                    'name' => 'Masjid Raya Bandung',
                    'alamat' => 'Jl. Dalem Kaum No.14, Balonggede, Kec. Regol, Kota Bandung, Jawa Barat 40251'
                ]
            ]
        );
    }
}