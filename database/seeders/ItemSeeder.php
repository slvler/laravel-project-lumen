<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('items')->insert([
            [
                'baslik' => "ayakkabı",
                'icerik' => "45 numara",
                'durum' => "1"
    
            ],
            [
                'baslik' => "elbise",
                'icerik' => "xl beden",
                'durum' => "1"
    
            ],
            [
                'baslik' => "dolap",
                'icerik' => "4 kapılı",
                'durum' => "0"
    
            ],
        ]);
    }
}
