<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Distrik;

class DistrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $disrik = Distrik::create([
            'nama_distrik' => 'KAUREH',
            'latitude' => '-3.12739',
            'longitude' =>  '139.9425241',
            'keterangan' =>  ''
        ]);



        $disrik = Distrik::create([
            'nama_distrik' => 'AIRU',
            'latitude' => '-3.5359541',
            'longitude' =>  '139.7382349',
            'keterangan' =>  ''
        ]);


        $disrik = Distrik::create([
            'nama_distrik' => 'YAPSI',
            'latitude' => '-2.8542088',
            'longitude' =>  '139.968122',
            'keterangan' =>  ''
        ]);

        $disrik = Distrik::create([
            'nama_distrik' => 'KEMTUK',
            'latitude' => '-2.6629485',
            'longitude' =>  '140.2720839',
            'keterangan' =>  ''
        ]);


        $disrik = Distrik::create([
            'nama_distrik' => 'KEMTUK GRESI',
            'latitude' => '-2.7318597',
            'longitude' =>  '140.1382353',
            'keterangan' =>  ''
        ]);

        $disrik = Distrik::create([
            'nama_distrik' => 'GRESI SELATAN',
            'latitude' => '-2.7064397',
            'longitude' =>  '140.108867',
            'keterangan' =>  ''
        ]);


        $disrik = Distrik::create([
            'nama_distrik' => 'NIMBORAN',
            'latitude' => '-2.6344598',
            'longitude' =>  '140.0591511',
            'keterangan' =>  ''
        ]);

        $disrik = Distrik::create([
            'nama_distrik' => 'NAMBLONG',
            'latitude' => '-2.6049849',
            'longitude' =>  '140.1946339',
            'keterangan' =>  ''
        ]);

        $disrik = Distrik::create([
            'nama_distrik' => 'NIMBOKRANG',
            'latitude' => '-2.520923',
            'longitude' =>  '140.0867401',
            'keterangan' =>  ''
        ]);

        $disrik = Distrik::create([
            'nama_distrik' => 'UNURUM GUAY',
            'latitude' => '-2.6599739',
            'longitude' =>  '139.4441592',
            'keterangan' =>  ''
        ]);

        $disrik = Distrik::create([
            'nama_distrik' => 'DEMTA',
            'latitude' => '-2.3884571',
            'longitude' =>  '140.004733',
            'keterangan' =>  ''
        ]);

        $disrik = Distrik::create([
            'nama_distrik' => 'YOKARI',
            'latitude' => '-2.4667549',
            'longitude' =>  '140.1585271',
            'keterangan' =>  ''
        ]);

        $disrik = Distrik::create([
            'nama_distrik' => 'DEPAPRE',
            'latitude' => '-2.4512246',
            'longitude' =>  '140.3395435',
            'keterangan' =>  ''
        ]);

        $disrik = Distrik::create([
            'nama_distrik' => 'RAVENIRARA',
            'latitude' => '-2.470554',
            'longitude' =>  '140.4602819',
            'keterangan' =>  ''
        ]);

        $disrik = Distrik::create([
            'nama_distrik' => 'SENTANI BARAT',
            'latitude' => '-2.5281694',
            'longitude' =>  '140.2812836',
            'keterangan' =>  ''
        ]);


        $disrik = Distrik::create([
            'nama_distrik' => 'WAIBHU',
            'latitude' => '-2.5663889',
            'longitude' =>  '140.3545814',
            'keterangan' =>  ''
        ]);

        $disrik = Distrik::create([
            'nama_distrik' => 'SENTANI',
            'latitude' => '-2.5675868',
            'longitude' =>  '140.4357905',
            'keterangan' =>  ''
        ]);

        $disrik = Distrik::create([
            'nama_distrik' => 'EMBUNGFAUW',
            'latitude' => '-2.6570516',
            'longitude' =>  '140.469072',
            'keterangan' =>  ''
        ]);


        $disrik = Distrik::create([
            'nama_distrik' => 'SENTANI TIMUR',
            'latitude' => '-2.6160503',
            'longitude' =>  '140.5019486',
            'keterangan' =>  ''
        ]);
    }


}
