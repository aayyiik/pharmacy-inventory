<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('supplier')->insert([
            [
                'name_supplier' => 'MAJA BINTANG INDONESIA PT',
                'address_supplier' => 'Jalan Raya Bina Marga No.32B Cipayung Jakarta Timur 13820, Indonesia'
            ],
            [
                'name_supplier' => 'Kleenviro Dinamika Utama PT',
                'address_supplier' => 'Taman Tekno BSD Blok J01 No 11 Tanggerang Selatan Banten'
            ],
            [
                'name_supplier' => '3M INDONESIA PT',
                'address_supplier' => 'Perkantoran Hijau Arkadia, Tower F, 8th Floor
                Jl. TB. Simatupang Kav. 88'
            ],

        ]);
    }
}
