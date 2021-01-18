<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvinsiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('provinsi')->delete();
        
        \DB::table('provinsi')->insert(array (
            0 => 
            array (
                'idprovinsi' => 1,
                'nama' => 'Bali',
            ),
            1 => 
            array (
                'idprovinsi' => 2,
                'nama' => 'Bangka Belitung',
            ),
            2 => 
            array (
                'idprovinsi' => 3,
                'nama' => 'Banten',
            ),
            3 => 
            array (
                'idprovinsi' => 4,
                'nama' => 'Bengkulu',
            ),
            4 => 
            array (
                'idprovinsi' => 5,
                'nama' => 'DI Yogyakarta',
            ),
            5 => 
            array (
                'idprovinsi' => 6,
                'nama' => 'DKI Jakarta',
            ),
            6 => 
            array (
                'idprovinsi' => 7,
                'nama' => 'Gorontalo',
            ),
            7 => 
            array (
                'idprovinsi' => 8,
                'nama' => 'Jambi',
            ),
            8 => 
            array (
                'idprovinsi' => 9,
                'nama' => 'Jawa Barat',
            ),
            9 => 
            array (
                'idprovinsi' => 10,
                'nama' => 'Jawa Tengah',
            ),
            10 => 
            array (
                'idprovinsi' => 11,
                'nama' => 'Jawa Timur',
            ),
            11 => 
            array (
                'idprovinsi' => 12,
                'nama' => 'Kalimantan Barat',
            ),
            12 => 
            array (
                'idprovinsi' => 13,
                'nama' => 'Kalimantan Selatan',
            ),
            13 => 
            array (
                'idprovinsi' => 14,
                'nama' => 'Kalimantan Tengah',
            ),
            14 => 
            array (
                'idprovinsi' => 15,
                'nama' => 'Kalimantan Timur',
            ),
            15 => 
            array (
                'idprovinsi' => 16,
                'nama' => 'Kalimantan Utara',
            ),
            16 => 
            array (
                'idprovinsi' => 17,
                'nama' => 'Kepulauan Riau',
            ),
            17 => 
            array (
                'idprovinsi' => 18,
                'nama' => 'Lampung',
            ),
            18 => 
            array (
                'idprovinsi' => 19,
                'nama' => 'Maluku',
            ),
            19 => 
            array (
                'idprovinsi' => 20,
                'nama' => 'Maluku Utara',
            ),
            20 => 
            array (
                'idprovinsi' => 21,
            'nama' => 'Nanggroe Aceh Darussalam (NAD)',
            ),
            21 => 
            array (
                'idprovinsi' => 22,
            'nama' => 'Nusa Tenggara Barat (NTB)',
            ),
            22 => 
            array (
                'idprovinsi' => 23,
            'nama' => 'Nusa Tenggara Timur (NTT)',
            ),
            23 => 
            array (
                'idprovinsi' => 24,
                'nama' => 'Papua',
            ),
            24 => 
            array (
                'idprovinsi' => 25,
                'nama' => 'Papua Barat',
            ),
            25 => 
            array (
                'idprovinsi' => 26,
                'nama' => 'Riau',
            ),
            26 => 
            array (
                'idprovinsi' => 27,
                'nama' => 'Sulawesi Barat',
            ),
            27 => 
            array (
                'idprovinsi' => 28,
                'nama' => 'Sulawesi Selatan',
            ),
            28 => 
            array (
                'idprovinsi' => 29,
                'nama' => 'Sulawesi Tengah',
            ),
            29 => 
            array (
                'idprovinsi' => 30,
                'nama' => 'Sulawesi Tenggara',
            ),
            30 => 
            array (
                'idprovinsi' => 31,
                'nama' => 'Sulawesi Utara',
            ),
            31 => 
            array (
                'idprovinsi' => 32,
                'nama' => 'Sumatera Barat',
            ),
            32 => 
            array (
                'idprovinsi' => 33,
                'nama' => 'Sumatera Selatan',
            ),
            33 => 
            array (
                'idprovinsi' => 34,
                'nama' => 'Sumatera Utara',
            ),
        ));
        
        
    }
}