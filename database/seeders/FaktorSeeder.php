<?php

namespace Database\Seeders;

use App\Models\Faktor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaktorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faktor = Faktor::create([
            'faktor' => 'Asupan Gizi yang Kurang',
            'keterangan' => '',
        ]);


        $faktor = Faktor::create([
            'faktor' => 'Pola Makan yang Buruk',
            'keterangan' => '',
        ]);

        $faktor = Faktor::create([
            'faktor' => 'Penyakit Infeksi Berulang',
            'keterangan' => '',
        ]);

        $faktor = Faktor::create([
            'faktor' => 'Kesehatan Ibu yang Buruk',
            'keterangan' => '',
        ]);

        $faktor = Faktor::create([
            'faktor' => 'Akses Terbatas ke Air Bersih dan Sanitasi',
            'keterangan' => '',
        ]);

        $faktor = Faktor::create([
            'faktor' => 'Praktik Pemberian ASI yang Tidak Tepat',
            'keterangan' => '',
        ]);

        $faktor = Faktor::create([
            'faktor' => 'Kemiskinan',
            'keterangan' => '',
        ]);

        $faktor = Faktor::create([
            'faktor' => 'Kurangnya Pendidikan Kesehatan',
            'keterangan' => '',
        ]);

        $faktor = Faktor::create([
            'faktor' => 'Faktor Sosial dan Budaya',
            'keterangan' => '',
        ]);
    }
}
