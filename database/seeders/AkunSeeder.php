<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Ari Lathifatul Chusna',
                'address' => 'Surabaya',
                'email' => 'chusna@gmail.com',
                'no_telp' => '08797286286',
                'role' => 'Administrator',
                'status' => 1,
                'password' => bcrypt('rahasia')
            ],
            [
                'name' => 'Gigi Hadid',
                'address' => 'Newyork',
                'email' => 'gigi@gmail.com',
                'no_telp' => '08797283737',
                'role' => 'Pegawai',
                'status' => 1,
                'password' => bcrypt('rahasia')
            ],

        ]);
    }
}
