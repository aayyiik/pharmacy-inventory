<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category')->insert([
            [
                'name_category' => 'Obat Herbal'
            ],
            [
                'name_category' => 'Obat tetes'
            ],
            [
                'name_category' => 'Obat Kapsul'
            ],
            [
                'name_category' => 'Obat oles'
            ],
            [
                'name_category' => 'Obat cair'
            ],
            [
                'name_category' => 'Obat Tablet'
            ],
        ]);
    }
}
