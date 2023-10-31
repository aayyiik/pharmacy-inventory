<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pharmacy')->insert([
            [
              'kode' => 'OLES01',
              'name' => 'Dermatix 50g',
              'merk' => 'Dermatix',
              'category_id' => '4',
              'stok' => '1000'
            ],
            [
                'kode' => 'TAB01',
                'name' => 'Paracetamol',
                'merk' => 'Paracetamol',
                'category_id' => '6',
                'stok' => '200'
              ],
        ]);
    }
}
