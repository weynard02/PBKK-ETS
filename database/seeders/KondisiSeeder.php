<?php

namespace Database\Seeders;

use App\Models\Kondisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KondisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kondisi = array("Baik", "Layak", "Rusak");
        $len = count($kondisi);
        for ($i = 0; $i < $len; $i++) {
            Kondisi::create([
                'nama' => $kondisi[$i]
            ]);
        }
    }
}
