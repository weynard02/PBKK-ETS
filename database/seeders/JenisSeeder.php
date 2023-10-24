<?php

namespace Database\Seeders;

use App\Models\Jenis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis = array("Makanan", "Elektronik", "Mainan", "Obat", "Lainnya");
        $len = count($jenis);
        for ($i = 0; $i < $len; $i++) {
            Jenis::create([
                'nama' => $jenis[$i]
            ]);
        }
    }
}
