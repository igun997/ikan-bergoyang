<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KotaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kota')->delete();
        
        \DB::table('kota')->insert(array (
            0 => 
            array (
                'idkota' => 1,
                'idprovinsi' => 21,
                'kodepos' => '23681',
                'nama' => 'Aceh Barat',
                'tipe' => 'Kabupaten',
            ),
            1 => 
            array (
                'idkota' => 2,
                'idprovinsi' => 21,
                'kodepos' => '23764',
                'nama' => 'Aceh Barat Daya',
                'tipe' => 'Kabupaten',
            ),
            2 => 
            array (
                'idkota' => 3,
                'idprovinsi' => 21,
                'kodepos' => '23951',
                'nama' => 'Aceh Besar',
                'tipe' => 'Kabupaten',
            ),
            3 => 
            array (
                'idkota' => 4,
                'idprovinsi' => 21,
                'kodepos' => '23654',
                'nama' => 'Aceh Jaya',
                'tipe' => 'Kabupaten',
            ),
            4 => 
            array (
                'idkota' => 5,
                'idprovinsi' => 21,
                'kodepos' => '23719',
                'nama' => 'Aceh Selatan',
                'tipe' => 'Kabupaten',
            ),
            5 => 
            array (
                'idkota' => 6,
                'idprovinsi' => 21,
                'kodepos' => '24785',
                'nama' => 'Aceh Singkil',
                'tipe' => 'Kabupaten',
            ),
            6 => 
            array (
                'idkota' => 7,
                'idprovinsi' => 21,
                'kodepos' => '24476',
                'nama' => 'Aceh Tamiang',
                'tipe' => 'Kabupaten',
            ),
            7 => 
            array (
                'idkota' => 8,
                'idprovinsi' => 21,
                'kodepos' => '24511',
                'nama' => 'Aceh Tengah',
                'tipe' => 'Kabupaten',
            ),
            8 => 
            array (
                'idkota' => 9,
                'idprovinsi' => 21,
                'kodepos' => '24611',
                'nama' => 'Aceh Tenggara',
                'tipe' => 'Kabupaten',
            ),
            9 => 
            array (
                'idkota' => 10,
                'idprovinsi' => 21,
                'kodepos' => '24454',
                'nama' => 'Aceh Timur',
                'tipe' => 'Kabupaten',
            ),
            10 => 
            array (
                'idkota' => 11,
                'idprovinsi' => 21,
                'kodepos' => '24382',
                'nama' => 'Aceh Utara',
                'tipe' => 'Kabupaten',
            ),
            11 => 
            array (
                'idkota' => 12,
                'idprovinsi' => 32,
                'kodepos' => '26411',
                'nama' => 'Agam',
                'tipe' => 'Kabupaten',
            ),
            12 => 
            array (
                'idkota' => 13,
                'idprovinsi' => 23,
                'kodepos' => '85811',
                'nama' => 'Alor',
                'tipe' => 'Kabupaten',
            ),
            13 => 
            array (
                'idkota' => 14,
                'idprovinsi' => 19,
                'kodepos' => '97222',
                'nama' => 'Ambon',
                'tipe' => 'Kota',
            ),
            14 => 
            array (
                'idkota' => 15,
                'idprovinsi' => 34,
                'kodepos' => '21214',
                'nama' => 'Asahan',
                'tipe' => 'Kabupaten',
            ),
            15 => 
            array (
                'idkota' => 16,
                'idprovinsi' => 24,
                'kodepos' => '99777',
                'nama' => 'Asmat',
                'tipe' => 'Kabupaten',
            ),
            16 => 
            array (
                'idkota' => 17,
                'idprovinsi' => 1,
                'kodepos' => '80351',
                'nama' => 'Badung',
                'tipe' => 'Kabupaten',
            ),
            17 => 
            array (
                'idkota' => 18,
                'idprovinsi' => 13,
                'kodepos' => '71611',
                'nama' => 'Balangan',
                'tipe' => 'Kabupaten',
            ),
            18 => 
            array (
                'idkota' => 19,
                'idprovinsi' => 15,
                'kodepos' => '76111',
                'nama' => 'Balikpapan',
                'tipe' => 'Kota',
            ),
            19 => 
            array (
                'idkota' => 20,
                'idprovinsi' => 21,
                'kodepos' => '23238',
                'nama' => 'Banda Aceh',
                'tipe' => 'Kota',
            ),
            20 => 
            array (
                'idkota' => 21,
                'idprovinsi' => 18,
                'kodepos' => '35139',
                'nama' => 'Bandar Lampung',
                'tipe' => 'Kota',
            ),
            21 => 
            array (
                'idkota' => 22,
                'idprovinsi' => 9,
                'kodepos' => '40311',
                'nama' => 'Bandung',
                'tipe' => 'Kabupaten',
            ),
            22 => 
            array (
                'idkota' => 23,
                'idprovinsi' => 9,
                'kodepos' => '40111',
                'nama' => 'Bandung',
                'tipe' => 'Kota',
            ),
            23 => 
            array (
                'idkota' => 24,
                'idprovinsi' => 9,
                'kodepos' => '40721',
                'nama' => 'Bandung Barat',
                'tipe' => 'Kabupaten',
            ),
            24 => 
            array (
                'idkota' => 25,
                'idprovinsi' => 29,
                'kodepos' => '94711',
                'nama' => 'Banggai',
                'tipe' => 'Kabupaten',
            ),
            25 => 
            array (
                'idkota' => 26,
                'idprovinsi' => 29,
                'kodepos' => '94881',
                'nama' => 'Banggai Kepulauan',
                'tipe' => 'Kabupaten',
            ),
            26 => 
            array (
                'idkota' => 27,
                'idprovinsi' => 2,
                'kodepos' => '33212',
                'nama' => 'Bangka',
                'tipe' => 'Kabupaten',
            ),
            27 => 
            array (
                'idkota' => 28,
                'idprovinsi' => 2,
                'kodepos' => '33315',
                'nama' => 'Bangka Barat',
                'tipe' => 'Kabupaten',
            ),
            28 => 
            array (
                'idkota' => 29,
                'idprovinsi' => 2,
                'kodepos' => '33719',
                'nama' => 'Bangka Selatan',
                'tipe' => 'Kabupaten',
            ),
            29 => 
            array (
                'idkota' => 30,
                'idprovinsi' => 2,
                'kodepos' => '33613',
                'nama' => 'Bangka Tengah',
                'tipe' => 'Kabupaten',
            ),
            30 => 
            array (
                'idkota' => 31,
                'idprovinsi' => 11,
                'kodepos' => '69118',
                'nama' => 'Bangkalan',
                'tipe' => 'Kabupaten',
            ),
            31 => 
            array (
                'idkota' => 32,
                'idprovinsi' => 1,
                'kodepos' => '80619',
                'nama' => 'Bangli',
                'tipe' => 'Kabupaten',
            ),
            32 => 
            array (
                'idkota' => 33,
                'idprovinsi' => 13,
                'kodepos' => '70619',
                'nama' => 'Banjar',
                'tipe' => 'Kabupaten',
            ),
            33 => 
            array (
                'idkota' => 34,
                'idprovinsi' => 9,
                'kodepos' => '46311',
                'nama' => 'Banjar',
                'tipe' => 'Kota',
            ),
            34 => 
            array (
                'idkota' => 35,
                'idprovinsi' => 13,
                'kodepos' => '70712',
                'nama' => 'Banjarbaru',
                'tipe' => 'Kota',
            ),
            35 => 
            array (
                'idkota' => 36,
                'idprovinsi' => 13,
                'kodepos' => '70117',
                'nama' => 'Banjarmasin',
                'tipe' => 'Kota',
            ),
            36 => 
            array (
                'idkota' => 37,
                'idprovinsi' => 10,
                'kodepos' => '53419',
                'nama' => 'Banjarnegara',
                'tipe' => 'Kabupaten',
            ),
            37 => 
            array (
                'idkota' => 38,
                'idprovinsi' => 28,
                'kodepos' => '92411',
                'nama' => 'Bantaeng',
                'tipe' => 'Kabupaten',
            ),
            38 => 
            array (
                'idkota' => 39,
                'idprovinsi' => 5,
                'kodepos' => '55715',
                'nama' => 'Bantul',
                'tipe' => 'Kabupaten',
            ),
            39 => 
            array (
                'idkota' => 40,
                'idprovinsi' => 33,
                'kodepos' => '30911',
                'nama' => 'Banyuasin',
                'tipe' => 'Kabupaten',
            ),
            40 => 
            array (
                'idkota' => 41,
                'idprovinsi' => 10,
                'kodepos' => '53114',
                'nama' => 'Banyumas',
                'tipe' => 'Kabupaten',
            ),
            41 => 
            array (
                'idkota' => 42,
                'idprovinsi' => 11,
                'kodepos' => '68416',
                'nama' => 'Banyuwangi',
                'tipe' => 'Kabupaten',
            ),
            42 => 
            array (
                'idkota' => 43,
                'idprovinsi' => 13,
                'kodepos' => '70511',
                'nama' => 'Barito Kuala',
                'tipe' => 'Kabupaten',
            ),
            43 => 
            array (
                'idkota' => 44,
                'idprovinsi' => 14,
                'kodepos' => '73711',
                'nama' => 'Barito Selatan',
                'tipe' => 'Kabupaten',
            ),
            44 => 
            array (
                'idkota' => 45,
                'idprovinsi' => 14,
                'kodepos' => '73671',
                'nama' => 'Barito Timur',
                'tipe' => 'Kabupaten',
            ),
            45 => 
            array (
                'idkota' => 46,
                'idprovinsi' => 14,
                'kodepos' => '73881',
                'nama' => 'Barito Utara',
                'tipe' => 'Kabupaten',
            ),
            46 => 
            array (
                'idkota' => 47,
                'idprovinsi' => 28,
                'kodepos' => '90719',
                'nama' => 'Barru',
                'tipe' => 'Kabupaten',
            ),
            47 => 
            array (
                'idkota' => 48,
                'idprovinsi' => 17,
                'kodepos' => '29413',
                'nama' => 'Batam',
                'tipe' => 'Kota',
            ),
            48 => 
            array (
                'idkota' => 49,
                'idprovinsi' => 10,
                'kodepos' => '51211',
                'nama' => 'Batang',
                'tipe' => 'Kabupaten',
            ),
            49 => 
            array (
                'idkota' => 50,
                'idprovinsi' => 8,
                'kodepos' => '36613',
                'nama' => 'Batang Hari',
                'tipe' => 'Kabupaten',
            ),
            50 => 
            array (
                'idkota' => 51,
                'idprovinsi' => 11,
                'kodepos' => '65311',
                'nama' => 'Batu',
                'tipe' => 'Kota',
            ),
            51 => 
            array (
                'idkota' => 52,
                'idprovinsi' => 34,
                'kodepos' => '21655',
                'nama' => 'Batu Bara',
                'tipe' => 'Kabupaten',
            ),
            52 => 
            array (
                'idkota' => 53,
                'idprovinsi' => 30,
                'kodepos' => '93719',
                'nama' => 'Bau-Bau',
                'tipe' => 'Kota',
            ),
            53 => 
            array (
                'idkota' => 54,
                'idprovinsi' => 9,
                'kodepos' => '17837',
                'nama' => 'Bekasi',
                'tipe' => 'Kabupaten',
            ),
            54 => 
            array (
                'idkota' => 55,
                'idprovinsi' => 9,
                'kodepos' => '17121',
                'nama' => 'Bekasi',
                'tipe' => 'Kota',
            ),
            55 => 
            array (
                'idkota' => 56,
                'idprovinsi' => 2,
                'kodepos' => '33419',
                'nama' => 'Belitung',
                'tipe' => 'Kabupaten',
            ),
            56 => 
            array (
                'idkota' => 57,
                'idprovinsi' => 2,
                'kodepos' => '33519',
                'nama' => 'Belitung Timur',
                'tipe' => 'Kabupaten',
            ),
            57 => 
            array (
                'idkota' => 58,
                'idprovinsi' => 23,
                'kodepos' => '85711',
                'nama' => 'Belu',
                'tipe' => 'Kabupaten',
            ),
            58 => 
            array (
                'idkota' => 59,
                'idprovinsi' => 21,
                'kodepos' => '24581',
                'nama' => 'Bener Meriah',
                'tipe' => 'Kabupaten',
            ),
            59 => 
            array (
                'idkota' => 60,
                'idprovinsi' => 26,
                'kodepos' => '28719',
                'nama' => 'Bengkalis',
                'tipe' => 'Kabupaten',
            ),
            60 => 
            array (
                'idkota' => 61,
                'idprovinsi' => 12,
                'kodepos' => '79213',
                'nama' => 'Bengkayang',
                'tipe' => 'Kabupaten',
            ),
            61 => 
            array (
                'idkota' => 62,
                'idprovinsi' => 4,
                'kodepos' => '38229',
                'nama' => 'Bengkulu',
                'tipe' => 'Kota',
            ),
            62 => 
            array (
                'idkota' => 63,
                'idprovinsi' => 4,
                'kodepos' => '38519',
                'nama' => 'Bengkulu Selatan',
                'tipe' => 'Kabupaten',
            ),
            63 => 
            array (
                'idkota' => 64,
                'idprovinsi' => 4,
                'kodepos' => '38319',
                'nama' => 'Bengkulu Tengah',
                'tipe' => 'Kabupaten',
            ),
            64 => 
            array (
                'idkota' => 65,
                'idprovinsi' => 4,
                'kodepos' => '38619',
                'nama' => 'Bengkulu Utara',
                'tipe' => 'Kabupaten',
            ),
            65 => 
            array (
                'idkota' => 66,
                'idprovinsi' => 15,
                'kodepos' => '77311',
                'nama' => 'Berau',
                'tipe' => 'Kabupaten',
            ),
            66 => 
            array (
                'idkota' => 67,
                'idprovinsi' => 24,
                'kodepos' => '98119',
                'nama' => 'Biak Numfor',
                'tipe' => 'Kabupaten',
            ),
            67 => 
            array (
                'idkota' => 68,
                'idprovinsi' => 22,
                'kodepos' => '84171',
                'nama' => 'Bima',
                'tipe' => 'Kabupaten',
            ),
            68 => 
            array (
                'idkota' => 69,
                'idprovinsi' => 22,
                'kodepos' => '84139',
                'nama' => 'Bima',
                'tipe' => 'Kota',
            ),
            69 => 
            array (
                'idkota' => 70,
                'idprovinsi' => 34,
                'kodepos' => '20712',
                'nama' => 'Binjai',
                'tipe' => 'Kota',
            ),
            70 => 
            array (
                'idkota' => 71,
                'idprovinsi' => 17,
                'kodepos' => '29135',
                'nama' => 'Bintan',
                'tipe' => 'Kabupaten',
            ),
            71 => 
            array (
                'idkota' => 72,
                'idprovinsi' => 21,
                'kodepos' => '24219',
                'nama' => 'Bireuen',
                'tipe' => 'Kabupaten',
            ),
            72 => 
            array (
                'idkota' => 73,
                'idprovinsi' => 31,
                'kodepos' => '95512',
                'nama' => 'Bitung',
                'tipe' => 'Kota',
            ),
            73 => 
            array (
                'idkota' => 74,
                'idprovinsi' => 11,
                'kodepos' => '66171',
                'nama' => 'Blitar',
                'tipe' => 'Kabupaten',
            ),
            74 => 
            array (
                'idkota' => 75,
                'idprovinsi' => 11,
                'kodepos' => '66124',
                'nama' => 'Blitar',
                'tipe' => 'Kota',
            ),
            75 => 
            array (
                'idkota' => 76,
                'idprovinsi' => 10,
                'kodepos' => '58219',
                'nama' => 'Blora',
                'tipe' => 'Kabupaten',
            ),
            76 => 
            array (
                'idkota' => 77,
                'idprovinsi' => 7,
                'kodepos' => '96319',
                'nama' => 'Boalemo',
                'tipe' => 'Kabupaten',
            ),
            77 => 
            array (
                'idkota' => 78,
                'idprovinsi' => 9,
                'kodepos' => '16911',
                'nama' => 'Bogor',
                'tipe' => 'Kabupaten',
            ),
            78 => 
            array (
                'idkota' => 79,
                'idprovinsi' => 9,
                'kodepos' => '16119',
                'nama' => 'Bogor',
                'tipe' => 'Kota',
            ),
            79 => 
            array (
                'idkota' => 80,
                'idprovinsi' => 11,
                'kodepos' => '62119',
                'nama' => 'Bojonegoro',
                'tipe' => 'Kabupaten',
            ),
            80 => 
            array (
                'idkota' => 81,
                'idprovinsi' => 31,
                'kodepos' => '95755',
            'nama' => 'Bolaang Mongondow (Bolmong)',
                'tipe' => 'Kabupaten',
            ),
            81 => 
            array (
                'idkota' => 82,
                'idprovinsi' => 31,
                'kodepos' => '95774',
                'nama' => 'Bolaang Mongondow Selatan',
                'tipe' => 'Kabupaten',
            ),
            82 => 
            array (
                'idkota' => 83,
                'idprovinsi' => 31,
                'kodepos' => '95783',
                'nama' => 'Bolaang Mongondow Timur',
                'tipe' => 'Kabupaten',
            ),
            83 => 
            array (
                'idkota' => 84,
                'idprovinsi' => 31,
                'kodepos' => '95765',
                'nama' => 'Bolaang Mongondow Utara',
                'tipe' => 'Kabupaten',
            ),
            84 => 
            array (
                'idkota' => 85,
                'idprovinsi' => 30,
                'kodepos' => '93771',
                'nama' => 'Bombana',
                'tipe' => 'Kabupaten',
            ),
            85 => 
            array (
                'idkota' => 86,
                'idprovinsi' => 11,
                'kodepos' => '68219',
                'nama' => 'Bondowoso',
                'tipe' => 'Kabupaten',
            ),
            86 => 
            array (
                'idkota' => 87,
                'idprovinsi' => 28,
                'kodepos' => '92713',
                'nama' => 'Bone',
                'tipe' => 'Kabupaten',
            ),
            87 => 
            array (
                'idkota' => 88,
                'idprovinsi' => 7,
                'kodepos' => '96511',
                'nama' => 'Bone Bolango',
                'tipe' => 'Kabupaten',
            ),
            88 => 
            array (
                'idkota' => 89,
                'idprovinsi' => 15,
                'kodepos' => '75313',
                'nama' => 'Bontang',
                'tipe' => 'Kota',
            ),
            89 => 
            array (
                'idkota' => 90,
                'idprovinsi' => 24,
                'kodepos' => '99662',
                'nama' => 'Boven Digoel',
                'tipe' => 'Kabupaten',
            ),
            90 => 
            array (
                'idkota' => 91,
                'idprovinsi' => 10,
                'kodepos' => '57312',
                'nama' => 'Boyolali',
                'tipe' => 'Kabupaten',
            ),
            91 => 
            array (
                'idkota' => 92,
                'idprovinsi' => 10,
                'kodepos' => '52212',
                'nama' => 'Brebes',
                'tipe' => 'Kabupaten',
            ),
            92 => 
            array (
                'idkota' => 93,
                'idprovinsi' => 32,
                'kodepos' => '26115',
                'nama' => 'Bukittinggi',
                'tipe' => 'Kota',
            ),
            93 => 
            array (
                'idkota' => 94,
                'idprovinsi' => 1,
                'kodepos' => '81111',
                'nama' => 'Buleleng',
                'tipe' => 'Kabupaten',
            ),
            94 => 
            array (
                'idkota' => 95,
                'idprovinsi' => 28,
                'kodepos' => '92511',
                'nama' => 'Bulukumba',
                'tipe' => 'Kabupaten',
            ),
            95 => 
            array (
                'idkota' => 96,
                'idprovinsi' => 16,
                'kodepos' => '77211',
            'nama' => 'Bulungan (Bulongan)',
                'tipe' => 'Kabupaten',
            ),
            96 => 
            array (
                'idkota' => 97,
                'idprovinsi' => 8,
                'kodepos' => '37216',
                'nama' => 'Bungo',
                'tipe' => 'Kabupaten',
            ),
            97 => 
            array (
                'idkota' => 98,
                'idprovinsi' => 29,
                'kodepos' => '94564',
                'nama' => 'Buol',
                'tipe' => 'Kabupaten',
            ),
            98 => 
            array (
                'idkota' => 99,
                'idprovinsi' => 19,
                'kodepos' => '97371',
                'nama' => 'Buru',
                'tipe' => 'Kabupaten',
            ),
            99 => 
            array (
                'idkota' => 100,
                'idprovinsi' => 19,
                'kodepos' => '97351',
                'nama' => 'Buru Selatan',
                'tipe' => 'Kabupaten',
            ),
            100 => 
            array (
                'idkota' => 101,
                'idprovinsi' => 30,
                'kodepos' => '93754',
                'nama' => 'Buton',
                'tipe' => 'Kabupaten',
            ),
            101 => 
            array (
                'idkota' => 102,
                'idprovinsi' => 30,
                'kodepos' => '93745',
                'nama' => 'Buton Utara',
                'tipe' => 'Kabupaten',
            ),
            102 => 
            array (
                'idkota' => 103,
                'idprovinsi' => 9,
                'kodepos' => '46211',
                'nama' => 'Ciamis',
                'tipe' => 'Kabupaten',
            ),
            103 => 
            array (
                'idkota' => 104,
                'idprovinsi' => 9,
                'kodepos' => '43217',
                'nama' => 'Cianjur',
                'tipe' => 'Kabupaten',
            ),
            104 => 
            array (
                'idkota' => 105,
                'idprovinsi' => 10,
                'kodepos' => '53211',
                'nama' => 'Cilacap',
                'tipe' => 'Kabupaten',
            ),
            105 => 
            array (
                'idkota' => 106,
                'idprovinsi' => 3,
                'kodepos' => '42417',
                'nama' => 'Cilegon',
                'tipe' => 'Kota',
            ),
            106 => 
            array (
                'idkota' => 107,
                'idprovinsi' => 9,
                'kodepos' => '40512',
                'nama' => 'Cimahi',
                'tipe' => 'Kota',
            ),
            107 => 
            array (
                'idkota' => 108,
                'idprovinsi' => 9,
                'kodepos' => '45611',
                'nama' => 'Cirebon',
                'tipe' => 'Kabupaten',
            ),
            108 => 
            array (
                'idkota' => 109,
                'idprovinsi' => 9,
                'kodepos' => '45116',
                'nama' => 'Cirebon',
                'tipe' => 'Kota',
            ),
            109 => 
            array (
                'idkota' => 110,
                'idprovinsi' => 34,
                'kodepos' => '22211',
                'nama' => 'Dairi',
                'tipe' => 'Kabupaten',
            ),
            110 => 
            array (
                'idkota' => 111,
                'idprovinsi' => 24,
                'kodepos' => '98784',
            'nama' => 'Deiyai (Deliyai)',
                'tipe' => 'Kabupaten',
            ),
            111 => 
            array (
                'idkota' => 112,
                'idprovinsi' => 34,
                'kodepos' => '20511',
                'nama' => 'Deli Serdang',
                'tipe' => 'Kabupaten',
            ),
            112 => 
            array (
                'idkota' => 113,
                'idprovinsi' => 10,
                'kodepos' => '59519',
                'nama' => 'Demak',
                'tipe' => 'Kabupaten',
            ),
            113 => 
            array (
                'idkota' => 114,
                'idprovinsi' => 1,
                'kodepos' => '80227',
                'nama' => 'Denpasar',
                'tipe' => 'Kota',
            ),
            114 => 
            array (
                'idkota' => 115,
                'idprovinsi' => 9,
                'kodepos' => '16416',
                'nama' => 'Depok',
                'tipe' => 'Kota',
            ),
            115 => 
            array (
                'idkota' => 116,
                'idprovinsi' => 32,
                'kodepos' => '27612',
                'nama' => 'Dharmasraya',
                'tipe' => 'Kabupaten',
            ),
            116 => 
            array (
                'idkota' => 117,
                'idprovinsi' => 24,
                'kodepos' => '98866',
                'nama' => 'Dogiyai',
                'tipe' => 'Kabupaten',
            ),
            117 => 
            array (
                'idkota' => 118,
                'idprovinsi' => 22,
                'kodepos' => '84217',
                'nama' => 'Dompu',
                'tipe' => 'Kabupaten',
            ),
            118 => 
            array (
                'idkota' => 119,
                'idprovinsi' => 29,
                'kodepos' => '94341',
                'nama' => 'Donggala',
                'tipe' => 'Kabupaten',
            ),
            119 => 
            array (
                'idkota' => 120,
                'idprovinsi' => 26,
                'kodepos' => '28811',
                'nama' => 'Dumai',
                'tipe' => 'Kota',
            ),
            120 => 
            array (
                'idkota' => 121,
                'idprovinsi' => 33,
                'kodepos' => '31811',
                'nama' => 'Empat Lawang',
                'tipe' => 'Kabupaten',
            ),
            121 => 
            array (
                'idkota' => 122,
                'idprovinsi' => 23,
                'kodepos' => '86351',
                'nama' => 'Ende',
                'tipe' => 'Kabupaten',
            ),
            122 => 
            array (
                'idkota' => 123,
                'idprovinsi' => 28,
                'kodepos' => '91719',
                'nama' => 'Enrekang',
                'tipe' => 'Kabupaten',
            ),
            123 => 
            array (
                'idkota' => 124,
                'idprovinsi' => 25,
                'kodepos' => '98651',
                'nama' => 'Fakfak',
                'tipe' => 'Kabupaten',
            ),
            124 => 
            array (
                'idkota' => 125,
                'idprovinsi' => 23,
                'kodepos' => '86213',
                'nama' => 'Flores Timur',
                'tipe' => 'Kabupaten',
            ),
            125 => 
            array (
                'idkota' => 126,
                'idprovinsi' => 9,
                'kodepos' => '44126',
                'nama' => 'Garut',
                'tipe' => 'Kabupaten',
            ),
            126 => 
            array (
                'idkota' => 127,
                'idprovinsi' => 21,
                'kodepos' => '24653',
                'nama' => 'Gayo Lues',
                'tipe' => 'Kabupaten',
            ),
            127 => 
            array (
                'idkota' => 128,
                'idprovinsi' => 1,
                'kodepos' => '80519',
                'nama' => 'Gianyar',
                'tipe' => 'Kabupaten',
            ),
            128 => 
            array (
                'idkota' => 129,
                'idprovinsi' => 7,
                'kodepos' => '96218',
                'nama' => 'Gorontalo',
                'tipe' => 'Kabupaten',
            ),
            129 => 
            array (
                'idkota' => 130,
                'idprovinsi' => 7,
                'kodepos' => '96115',
                'nama' => 'Gorontalo',
                'tipe' => 'Kota',
            ),
            130 => 
            array (
                'idkota' => 131,
                'idprovinsi' => 7,
                'kodepos' => '96611',
                'nama' => 'Gorontalo Utara',
                'tipe' => 'Kabupaten',
            ),
            131 => 
            array (
                'idkota' => 132,
                'idprovinsi' => 28,
                'kodepos' => '92111',
                'nama' => 'Gowa',
                'tipe' => 'Kabupaten',
            ),
            132 => 
            array (
                'idkota' => 133,
                'idprovinsi' => 11,
                'kodepos' => '61115',
                'nama' => 'Gresik',
                'tipe' => 'Kabupaten',
            ),
            133 => 
            array (
                'idkota' => 134,
                'idprovinsi' => 10,
                'kodepos' => '58111',
                'nama' => 'Grobogan',
                'tipe' => 'Kabupaten',
            ),
            134 => 
            array (
                'idkota' => 135,
                'idprovinsi' => 5,
                'kodepos' => '55812',
                'nama' => 'Gunung Kidul',
                'tipe' => 'Kabupaten',
            ),
            135 => 
            array (
                'idkota' => 136,
                'idprovinsi' => 14,
                'kodepos' => '74511',
                'nama' => 'Gunung Mas',
                'tipe' => 'Kabupaten',
            ),
            136 => 
            array (
                'idkota' => 137,
                'idprovinsi' => 34,
                'kodepos' => '22813',
                'nama' => 'Gunungsitoli',
                'tipe' => 'Kota',
            ),
            137 => 
            array (
                'idkota' => 138,
                'idprovinsi' => 20,
                'kodepos' => '97757',
                'nama' => 'Halmahera Barat',
                'tipe' => 'Kabupaten',
            ),
            138 => 
            array (
                'idkota' => 139,
                'idprovinsi' => 20,
                'kodepos' => '97911',
                'nama' => 'Halmahera Selatan',
                'tipe' => 'Kabupaten',
            ),
            139 => 
            array (
                'idkota' => 140,
                'idprovinsi' => 20,
                'kodepos' => '97853',
                'nama' => 'Halmahera Tengah',
                'tipe' => 'Kabupaten',
            ),
            140 => 
            array (
                'idkota' => 141,
                'idprovinsi' => 20,
                'kodepos' => '97862',
                'nama' => 'Halmahera Timur',
                'tipe' => 'Kabupaten',
            ),
            141 => 
            array (
                'idkota' => 142,
                'idprovinsi' => 20,
                'kodepos' => '97762',
                'nama' => 'Halmahera Utara',
                'tipe' => 'Kabupaten',
            ),
            142 => 
            array (
                'idkota' => 143,
                'idprovinsi' => 13,
                'kodepos' => '71212',
                'nama' => 'Hulu Sungai Selatan',
                'tipe' => 'Kabupaten',
            ),
            143 => 
            array (
                'idkota' => 144,
                'idprovinsi' => 13,
                'kodepos' => '71313',
                'nama' => 'Hulu Sungai Tengah',
                'tipe' => 'Kabupaten',
            ),
            144 => 
            array (
                'idkota' => 145,
                'idprovinsi' => 13,
                'kodepos' => '71419',
                'nama' => 'Hulu Sungai Utara',
                'tipe' => 'Kabupaten',
            ),
            145 => 
            array (
                'idkota' => 146,
                'idprovinsi' => 34,
                'kodepos' => '22457',
                'nama' => 'Humbang Hasundutan',
                'tipe' => 'Kabupaten',
            ),
            146 => 
            array (
                'idkota' => 147,
                'idprovinsi' => 26,
                'kodepos' => '29212',
                'nama' => 'Indragiri Hilir',
                'tipe' => 'Kabupaten',
            ),
            147 => 
            array (
                'idkota' => 148,
                'idprovinsi' => 26,
                'kodepos' => '29319',
                'nama' => 'Indragiri Hulu',
                'tipe' => 'Kabupaten',
            ),
            148 => 
            array (
                'idkota' => 149,
                'idprovinsi' => 9,
                'kodepos' => '45214',
                'nama' => 'Indramayu',
                'tipe' => 'Kabupaten',
            ),
            149 => 
            array (
                'idkota' => 150,
                'idprovinsi' => 24,
                'kodepos' => '98771',
                'nama' => 'Intan Jaya',
                'tipe' => 'Kabupaten',
            ),
            150 => 
            array (
                'idkota' => 151,
                'idprovinsi' => 6,
                'kodepos' => '11220',
                'nama' => 'Jakarta Barat',
                'tipe' => 'Kota',
            ),
            151 => 
            array (
                'idkota' => 152,
                'idprovinsi' => 6,
                'kodepos' => '10540',
                'nama' => 'Jakarta Pusat',
                'tipe' => 'Kota',
            ),
            152 => 
            array (
                'idkota' => 153,
                'idprovinsi' => 6,
                'kodepos' => '12230',
                'nama' => 'Jakarta Selatan',
                'tipe' => 'Kota',
            ),
            153 => 
            array (
                'idkota' => 154,
                'idprovinsi' => 6,
                'kodepos' => '13330',
                'nama' => 'Jakarta Timur',
                'tipe' => 'Kota',
            ),
            154 => 
            array (
                'idkota' => 155,
                'idprovinsi' => 6,
                'kodepos' => '14140',
                'nama' => 'Jakarta Utara',
                'tipe' => 'Kota',
            ),
            155 => 
            array (
                'idkota' => 156,
                'idprovinsi' => 8,
                'kodepos' => '36111',
                'nama' => 'Jambi',
                'tipe' => 'Kota',
            ),
            156 => 
            array (
                'idkota' => 157,
                'idprovinsi' => 24,
                'kodepos' => '99352',
                'nama' => 'Jayapura',
                'tipe' => 'Kabupaten',
            ),
            157 => 
            array (
                'idkota' => 158,
                'idprovinsi' => 24,
                'kodepos' => '99114',
                'nama' => 'Jayapura',
                'tipe' => 'Kota',
            ),
            158 => 
            array (
                'idkota' => 159,
                'idprovinsi' => 24,
                'kodepos' => '99511',
                'nama' => 'Jayawijaya',
                'tipe' => 'Kabupaten',
            ),
            159 => 
            array (
                'idkota' => 160,
                'idprovinsi' => 11,
                'kodepos' => '68113',
                'nama' => 'Jember',
                'tipe' => 'Kabupaten',
            ),
            160 => 
            array (
                'idkota' => 161,
                'idprovinsi' => 1,
                'kodepos' => '82251',
                'nama' => 'Jembrana',
                'tipe' => 'Kabupaten',
            ),
            161 => 
            array (
                'idkota' => 162,
                'idprovinsi' => 28,
                'kodepos' => '92319',
                'nama' => 'Jeneponto',
                'tipe' => 'Kabupaten',
            ),
            162 => 
            array (
                'idkota' => 163,
                'idprovinsi' => 10,
                'kodepos' => '59419',
                'nama' => 'Jepara',
                'tipe' => 'Kabupaten',
            ),
            163 => 
            array (
                'idkota' => 164,
                'idprovinsi' => 11,
                'kodepos' => '61415',
                'nama' => 'Jombang',
                'tipe' => 'Kabupaten',
            ),
            164 => 
            array (
                'idkota' => 165,
                'idprovinsi' => 25,
                'kodepos' => '98671',
                'nama' => 'Kaimana',
                'tipe' => 'Kabupaten',
            ),
            165 => 
            array (
                'idkota' => 166,
                'idprovinsi' => 26,
                'kodepos' => '28411',
                'nama' => 'Kampar',
                'tipe' => 'Kabupaten',
            ),
            166 => 
            array (
                'idkota' => 167,
                'idprovinsi' => 14,
                'kodepos' => '73583',
                'nama' => 'Kapuas',
                'tipe' => 'Kabupaten',
            ),
            167 => 
            array (
                'idkota' => 168,
                'idprovinsi' => 12,
                'kodepos' => '78719',
                'nama' => 'Kapuas Hulu',
                'tipe' => 'Kabupaten',
            ),
            168 => 
            array (
                'idkota' => 169,
                'idprovinsi' => 10,
                'kodepos' => '57718',
                'nama' => 'Karanganyar',
                'tipe' => 'Kabupaten',
            ),
            169 => 
            array (
                'idkota' => 170,
                'idprovinsi' => 1,
                'kodepos' => '80819',
                'nama' => 'Karangasem',
                'tipe' => 'Kabupaten',
            ),
            170 => 
            array (
                'idkota' => 171,
                'idprovinsi' => 9,
                'kodepos' => '41311',
                'nama' => 'Karawang',
                'tipe' => 'Kabupaten',
            ),
            171 => 
            array (
                'idkota' => 172,
                'idprovinsi' => 17,
                'kodepos' => '29611',
                'nama' => 'Karimun',
                'tipe' => 'Kabupaten',
            ),
            172 => 
            array (
                'idkota' => 173,
                'idprovinsi' => 34,
                'kodepos' => '22119',
                'nama' => 'Karo',
                'tipe' => 'Kabupaten',
            ),
            173 => 
            array (
                'idkota' => 174,
                'idprovinsi' => 14,
                'kodepos' => '74411',
                'nama' => 'Katingan',
                'tipe' => 'Kabupaten',
            ),
            174 => 
            array (
                'idkota' => 175,
                'idprovinsi' => 4,
                'kodepos' => '38911',
                'nama' => 'Kaur',
                'tipe' => 'Kabupaten',
            ),
            175 => 
            array (
                'idkota' => 176,
                'idprovinsi' => 12,
                'kodepos' => '78852',
                'nama' => 'Kayong Utara',
                'tipe' => 'Kabupaten',
            ),
            176 => 
            array (
                'idkota' => 177,
                'idprovinsi' => 10,
                'kodepos' => '54319',
                'nama' => 'Kebumen',
                'tipe' => 'Kabupaten',
            ),
            177 => 
            array (
                'idkota' => 178,
                'idprovinsi' => 11,
                'kodepos' => '64184',
                'nama' => 'Kediri',
                'tipe' => 'Kabupaten',
            ),
            178 => 
            array (
                'idkota' => 179,
                'idprovinsi' => 11,
                'kodepos' => '64125',
                'nama' => 'Kediri',
                'tipe' => 'Kota',
            ),
            179 => 
            array (
                'idkota' => 180,
                'idprovinsi' => 24,
                'kodepos' => '99461',
                'nama' => 'Keerom',
                'tipe' => 'Kabupaten',
            ),
            180 => 
            array (
                'idkota' => 181,
                'idprovinsi' => 10,
                'kodepos' => '51314',
                'nama' => 'Kendal',
                'tipe' => 'Kabupaten',
            ),
            181 => 
            array (
                'idkota' => 182,
                'idprovinsi' => 30,
                'kodepos' => '93126',
                'nama' => 'Kendari',
                'tipe' => 'Kota',
            ),
            182 => 
            array (
                'idkota' => 183,
                'idprovinsi' => 4,
                'kodepos' => '39319',
                'nama' => 'Kepahiang',
                'tipe' => 'Kabupaten',
            ),
            183 => 
            array (
                'idkota' => 184,
                'idprovinsi' => 17,
                'kodepos' => '29991',
                'nama' => 'Kepulauan Anambas',
                'tipe' => 'Kabupaten',
            ),
            184 => 
            array (
                'idkota' => 185,
                'idprovinsi' => 19,
                'kodepos' => '97681',
                'nama' => 'Kepulauan Aru',
                'tipe' => 'Kabupaten',
            ),
            185 => 
            array (
                'idkota' => 186,
                'idprovinsi' => 32,
                'kodepos' => '25771',
                'nama' => 'Kepulauan Mentawai',
                'tipe' => 'Kabupaten',
            ),
            186 => 
            array (
                'idkota' => 187,
                'idprovinsi' => 26,
                'kodepos' => '28791',
                'nama' => 'Kepulauan Meranti',
                'tipe' => 'Kabupaten',
            ),
            187 => 
            array (
                'idkota' => 188,
                'idprovinsi' => 31,
                'kodepos' => '95819',
                'nama' => 'Kepulauan Sangihe',
                'tipe' => 'Kabupaten',
            ),
            188 => 
            array (
                'idkota' => 189,
                'idprovinsi' => 6,
                'kodepos' => '14550',
                'nama' => 'Kepulauan Seribu',
                'tipe' => 'Kabupaten',
            ),
            189 => 
            array (
                'idkota' => 190,
                'idprovinsi' => 31,
                'kodepos' => '95862',
            'nama' => 'Kepulauan Siau Tagulandang Biaro (Sitaro)',
                'tipe' => 'Kabupaten',
            ),
            190 => 
            array (
                'idkota' => 191,
                'idprovinsi' => 20,
                'kodepos' => '97995',
                'nama' => 'Kepulauan Sula',
                'tipe' => 'Kabupaten',
            ),
            191 => 
            array (
                'idkota' => 192,
                'idprovinsi' => 31,
                'kodepos' => '95885',
                'nama' => 'Kepulauan Talaud',
                'tipe' => 'Kabupaten',
            ),
            192 => 
            array (
                'idkota' => 193,
                'idprovinsi' => 24,
                'kodepos' => '98211',
            'nama' => 'Kepulauan Yapen (Yapen Waropen)',
                'tipe' => 'Kabupaten',
            ),
            193 => 
            array (
                'idkota' => 194,
                'idprovinsi' => 8,
                'kodepos' => '37167',
                'nama' => 'Kerinci',
                'tipe' => 'Kabupaten',
            ),
            194 => 
            array (
                'idkota' => 195,
                'idprovinsi' => 12,
                'kodepos' => '78874',
                'nama' => 'Ketapang',
                'tipe' => 'Kabupaten',
            ),
            195 => 
            array (
                'idkota' => 196,
                'idprovinsi' => 10,
                'kodepos' => '57411',
                'nama' => 'Klaten',
                'tipe' => 'Kabupaten',
            ),
            196 => 
            array (
                'idkota' => 197,
                'idprovinsi' => 1,
                'kodepos' => '80719',
                'nama' => 'Klungkung',
                'tipe' => 'Kabupaten',
            ),
            197 => 
            array (
                'idkota' => 198,
                'idprovinsi' => 30,
                'kodepos' => '93511',
                'nama' => 'Kolaka',
                'tipe' => 'Kabupaten',
            ),
            198 => 
            array (
                'idkota' => 199,
                'idprovinsi' => 30,
                'kodepos' => '93911',
                'nama' => 'Kolaka Utara',
                'tipe' => 'Kabupaten',
            ),
            199 => 
            array (
                'idkota' => 200,
                'idprovinsi' => 30,
                'kodepos' => '93411',
                'nama' => 'Konawe',
                'tipe' => 'Kabupaten',
            ),
            200 => 
            array (
                'idkota' => 201,
                'idprovinsi' => 30,
                'kodepos' => '93811',
                'nama' => 'Konawe Selatan',
                'tipe' => 'Kabupaten',
            ),
            201 => 
            array (
                'idkota' => 202,
                'idprovinsi' => 30,
                'kodepos' => '93311',
                'nama' => 'Konawe Utara',
                'tipe' => 'Kabupaten',
            ),
            202 => 
            array (
                'idkota' => 203,
                'idprovinsi' => 13,
                'kodepos' => '72119',
                'nama' => 'Kotabaru',
                'tipe' => 'Kabupaten',
            ),
            203 => 
            array (
                'idkota' => 204,
                'idprovinsi' => 31,
                'kodepos' => '95711',
                'nama' => 'Kotamobagu',
                'tipe' => 'Kota',
            ),
            204 => 
            array (
                'idkota' => 205,
                'idprovinsi' => 14,
                'kodepos' => '74119',
                'nama' => 'Kotawaringin Barat',
                'tipe' => 'Kabupaten',
            ),
            205 => 
            array (
                'idkota' => 206,
                'idprovinsi' => 14,
                'kodepos' => '74364',
                'nama' => 'Kotawaringin Timur',
                'tipe' => 'Kabupaten',
            ),
            206 => 
            array (
                'idkota' => 207,
                'idprovinsi' => 26,
                'kodepos' => '29519',
                'nama' => 'Kuantan Singingi',
                'tipe' => 'Kabupaten',
            ),
            207 => 
            array (
                'idkota' => 208,
                'idprovinsi' => 12,
                'kodepos' => '78311',
                'nama' => 'Kubu Raya',
                'tipe' => 'Kabupaten',
            ),
            208 => 
            array (
                'idkota' => 209,
                'idprovinsi' => 10,
                'kodepos' => '59311',
                'nama' => 'Kudus',
                'tipe' => 'Kabupaten',
            ),
            209 => 
            array (
                'idkota' => 210,
                'idprovinsi' => 5,
                'kodepos' => '55611',
                'nama' => 'Kulon Progo',
                'tipe' => 'Kabupaten',
            ),
            210 => 
            array (
                'idkota' => 211,
                'idprovinsi' => 9,
                'kodepos' => '45511',
                'nama' => 'Kuningan',
                'tipe' => 'Kabupaten',
            ),
            211 => 
            array (
                'idkota' => 212,
                'idprovinsi' => 23,
                'kodepos' => '85362',
                'nama' => 'Kupang',
                'tipe' => 'Kabupaten',
            ),
            212 => 
            array (
                'idkota' => 213,
                'idprovinsi' => 23,
                'kodepos' => '85119',
                'nama' => 'Kupang',
                'tipe' => 'Kota',
            ),
            213 => 
            array (
                'idkota' => 214,
                'idprovinsi' => 15,
                'kodepos' => '75711',
                'nama' => 'Kutai Barat',
                'tipe' => 'Kabupaten',
            ),
            214 => 
            array (
                'idkota' => 215,
                'idprovinsi' => 15,
                'kodepos' => '75511',
                'nama' => 'Kutai Kartanegara',
                'tipe' => 'Kabupaten',
            ),
            215 => 
            array (
                'idkota' => 216,
                'idprovinsi' => 15,
                'kodepos' => '75611',
                'nama' => 'Kutai Timur',
                'tipe' => 'Kabupaten',
            ),
            216 => 
            array (
                'idkota' => 217,
                'idprovinsi' => 34,
                'kodepos' => '21412',
                'nama' => 'Labuhan Batu',
                'tipe' => 'Kabupaten',
            ),
            217 => 
            array (
                'idkota' => 218,
                'idprovinsi' => 34,
                'kodepos' => '21511',
                'nama' => 'Labuhan Batu Selatan',
                'tipe' => 'Kabupaten',
            ),
            218 => 
            array (
                'idkota' => 219,
                'idprovinsi' => 34,
                'kodepos' => '21711',
                'nama' => 'Labuhan Batu Utara',
                'tipe' => 'Kabupaten',
            ),
            219 => 
            array (
                'idkota' => 220,
                'idprovinsi' => 33,
                'kodepos' => '31419',
                'nama' => 'Lahat',
                'tipe' => 'Kabupaten',
            ),
            220 => 
            array (
                'idkota' => 221,
                'idprovinsi' => 14,
                'kodepos' => '74611',
                'nama' => 'Lamandau',
                'tipe' => 'Kabupaten',
            ),
            221 => 
            array (
                'idkota' => 222,
                'idprovinsi' => 11,
                'kodepos' => '64125',
                'nama' => 'Lamongan',
                'tipe' => 'Kabupaten',
            ),
            222 => 
            array (
                'idkota' => 223,
                'idprovinsi' => 18,
                'kodepos' => '34814',
                'nama' => 'Lampung Barat',
                'tipe' => 'Kabupaten',
            ),
            223 => 
            array (
                'idkota' => 224,
                'idprovinsi' => 18,
                'kodepos' => '35511',
                'nama' => 'Lampung Selatan',
                'tipe' => 'Kabupaten',
            ),
            224 => 
            array (
                'idkota' => 225,
                'idprovinsi' => 18,
                'kodepos' => '34212',
                'nama' => 'Lampung Tengah',
                'tipe' => 'Kabupaten',
            ),
            225 => 
            array (
                'idkota' => 226,
                'idprovinsi' => 18,
                'kodepos' => '34319',
                'nama' => 'Lampung Timur',
                'tipe' => 'Kabupaten',
            ),
            226 => 
            array (
                'idkota' => 227,
                'idprovinsi' => 18,
                'kodepos' => '34516',
                'nama' => 'Lampung Utara',
                'tipe' => 'Kabupaten',
            ),
            227 => 
            array (
                'idkota' => 228,
                'idprovinsi' => 12,
                'kodepos' => '78319',
                'nama' => 'Landak',
                'tipe' => 'Kabupaten',
            ),
            228 => 
            array (
                'idkota' => 229,
                'idprovinsi' => 34,
                'kodepos' => '20811',
                'nama' => 'Langkat',
                'tipe' => 'Kabupaten',
            ),
            229 => 
            array (
                'idkota' => 230,
                'idprovinsi' => 21,
                'kodepos' => '24412',
                'nama' => 'Langsa',
                'tipe' => 'Kota',
            ),
            230 => 
            array (
                'idkota' => 231,
                'idprovinsi' => 24,
                'kodepos' => '99531',
                'nama' => 'Lanny Jaya',
                'tipe' => 'Kabupaten',
            ),
            231 => 
            array (
                'idkota' => 232,
                'idprovinsi' => 3,
                'kodepos' => '42319',
                'nama' => 'Lebak',
                'tipe' => 'Kabupaten',
            ),
            232 => 
            array (
                'idkota' => 233,
                'idprovinsi' => 4,
                'kodepos' => '39264',
                'nama' => 'Lebong',
                'tipe' => 'Kabupaten',
            ),
            233 => 
            array (
                'idkota' => 234,
                'idprovinsi' => 23,
                'kodepos' => '86611',
                'nama' => 'Lembata',
                'tipe' => 'Kabupaten',
            ),
            234 => 
            array (
                'idkota' => 235,
                'idprovinsi' => 21,
                'kodepos' => '24352',
                'nama' => 'Lhokseumawe',
                'tipe' => 'Kota',
            ),
            235 => 
            array (
                'idkota' => 236,
                'idprovinsi' => 32,
                'kodepos' => '26671',
                'nama' => 'Lima Puluh Koto/Kota',
                'tipe' => 'Kabupaten',
            ),
            236 => 
            array (
                'idkota' => 237,
                'idprovinsi' => 17,
                'kodepos' => '29811',
                'nama' => 'Lingga',
                'tipe' => 'Kabupaten',
            ),
            237 => 
            array (
                'idkota' => 238,
                'idprovinsi' => 22,
                'kodepos' => '83311',
                'nama' => 'Lombok Barat',
                'tipe' => 'Kabupaten',
            ),
            238 => 
            array (
                'idkota' => 239,
                'idprovinsi' => 22,
                'kodepos' => '83511',
                'nama' => 'Lombok Tengah',
                'tipe' => 'Kabupaten',
            ),
            239 => 
            array (
                'idkota' => 240,
                'idprovinsi' => 22,
                'kodepos' => '83612',
                'nama' => 'Lombok Timur',
                'tipe' => 'Kabupaten',
            ),
            240 => 
            array (
                'idkota' => 241,
                'idprovinsi' => 22,
                'kodepos' => '83711',
                'nama' => 'Lombok Utara',
                'tipe' => 'Kabupaten',
            ),
            241 => 
            array (
                'idkota' => 242,
                'idprovinsi' => 33,
                'kodepos' => '31614',
                'nama' => 'Lubuk Linggau',
                'tipe' => 'Kota',
            ),
            242 => 
            array (
                'idkota' => 243,
                'idprovinsi' => 11,
                'kodepos' => '67319',
                'nama' => 'Lumajang',
                'tipe' => 'Kabupaten',
            ),
            243 => 
            array (
                'idkota' => 244,
                'idprovinsi' => 28,
                'kodepos' => '91994',
                'nama' => 'Luwu',
                'tipe' => 'Kabupaten',
            ),
            244 => 
            array (
                'idkota' => 245,
                'idprovinsi' => 28,
                'kodepos' => '92981',
                'nama' => 'Luwu Timur',
                'tipe' => 'Kabupaten',
            ),
            245 => 
            array (
                'idkota' => 246,
                'idprovinsi' => 28,
                'kodepos' => '92911',
                'nama' => 'Luwu Utara',
                'tipe' => 'Kabupaten',
            ),
            246 => 
            array (
                'idkota' => 247,
                'idprovinsi' => 11,
                'kodepos' => '63153',
                'nama' => 'Madiun',
                'tipe' => 'Kabupaten',
            ),
            247 => 
            array (
                'idkota' => 248,
                'idprovinsi' => 11,
                'kodepos' => '63122',
                'nama' => 'Madiun',
                'tipe' => 'Kota',
            ),
            248 => 
            array (
                'idkota' => 249,
                'idprovinsi' => 10,
                'kodepos' => '56519',
                'nama' => 'Magelang',
                'tipe' => 'Kabupaten',
            ),
            249 => 
            array (
                'idkota' => 250,
                'idprovinsi' => 10,
                'kodepos' => '56133',
                'nama' => 'Magelang',
                'tipe' => 'Kota',
            ),
            250 => 
            array (
                'idkota' => 251,
                'idprovinsi' => 11,
                'kodepos' => '63314',
                'nama' => 'Magetan',
                'tipe' => 'Kabupaten',
            ),
            251 => 
            array (
                'idkota' => 252,
                'idprovinsi' => 9,
                'kodepos' => '45412',
                'nama' => 'Majalengka',
                'tipe' => 'Kabupaten',
            ),
            252 => 
            array (
                'idkota' => 253,
                'idprovinsi' => 27,
                'kodepos' => '91411',
                'nama' => 'Majene',
                'tipe' => 'Kabupaten',
            ),
            253 => 
            array (
                'idkota' => 254,
                'idprovinsi' => 28,
                'kodepos' => '90111',
                'nama' => 'Makassar',
                'tipe' => 'Kota',
            ),
            254 => 
            array (
                'idkota' => 255,
                'idprovinsi' => 11,
                'kodepos' => '65163',
                'nama' => 'Malang',
                'tipe' => 'Kabupaten',
            ),
            255 => 
            array (
                'idkota' => 256,
                'idprovinsi' => 11,
                'kodepos' => '65112',
                'nama' => 'Malang',
                'tipe' => 'Kota',
            ),
            256 => 
            array (
                'idkota' => 257,
                'idprovinsi' => 16,
                'kodepos' => '77511',
                'nama' => 'Malinau',
                'tipe' => 'Kabupaten',
            ),
            257 => 
            array (
                'idkota' => 258,
                'idprovinsi' => 19,
                'kodepos' => '97451',
                'nama' => 'Maluku Barat Daya',
                'tipe' => 'Kabupaten',
            ),
            258 => 
            array (
                'idkota' => 259,
                'idprovinsi' => 19,
                'kodepos' => '97513',
                'nama' => 'Maluku Tengah',
                'tipe' => 'Kabupaten',
            ),
            259 => 
            array (
                'idkota' => 260,
                'idprovinsi' => 19,
                'kodepos' => '97651',
                'nama' => 'Maluku Tenggara',
                'tipe' => 'Kabupaten',
            ),
            260 => 
            array (
                'idkota' => 261,
                'idprovinsi' => 19,
                'kodepos' => '97465',
                'nama' => 'Maluku Tenggara Barat',
                'tipe' => 'Kabupaten',
            ),
            261 => 
            array (
                'idkota' => 262,
                'idprovinsi' => 27,
                'kodepos' => '91362',
                'nama' => 'Mamasa',
                'tipe' => 'Kabupaten',
            ),
            262 => 
            array (
                'idkota' => 263,
                'idprovinsi' => 24,
                'kodepos' => '99381',
                'nama' => 'Mamberamo Raya',
                'tipe' => 'Kabupaten',
            ),
            263 => 
            array (
                'idkota' => 264,
                'idprovinsi' => 24,
                'kodepos' => '99553',
                'nama' => 'Mamberamo Tengah',
                'tipe' => 'Kabupaten',
            ),
            264 => 
            array (
                'idkota' => 265,
                'idprovinsi' => 27,
                'kodepos' => '91519',
                'nama' => 'Mamuju',
                'tipe' => 'Kabupaten',
            ),
            265 => 
            array (
                'idkota' => 266,
                'idprovinsi' => 27,
                'kodepos' => '91571',
                'nama' => 'Mamuju Utara',
                'tipe' => 'Kabupaten',
            ),
            266 => 
            array (
                'idkota' => 267,
                'idprovinsi' => 31,
                'kodepos' => '95247',
                'nama' => 'Manado',
                'tipe' => 'Kota',
            ),
            267 => 
            array (
                'idkota' => 268,
                'idprovinsi' => 34,
                'kodepos' => '22916',
                'nama' => 'Mandailing Natal',
                'tipe' => 'Kabupaten',
            ),
            268 => 
            array (
                'idkota' => 269,
                'idprovinsi' => 23,
                'kodepos' => '86551',
                'nama' => 'Manggarai',
                'tipe' => 'Kabupaten',
            ),
            269 => 
            array (
                'idkota' => 270,
                'idprovinsi' => 23,
                'kodepos' => '86711',
                'nama' => 'Manggarai Barat',
                'tipe' => 'Kabupaten',
            ),
            270 => 
            array (
                'idkota' => 271,
                'idprovinsi' => 23,
                'kodepos' => '86811',
                'nama' => 'Manggarai Timur',
                'tipe' => 'Kabupaten',
            ),
            271 => 
            array (
                'idkota' => 272,
                'idprovinsi' => 25,
                'kodepos' => '98311',
                'nama' => 'Manokwari',
                'tipe' => 'Kabupaten',
            ),
            272 => 
            array (
                'idkota' => 273,
                'idprovinsi' => 25,
                'kodepos' => '98355',
                'nama' => 'Manokwari Selatan',
                'tipe' => 'Kabupaten',
            ),
            273 => 
            array (
                'idkota' => 274,
                'idprovinsi' => 24,
                'kodepos' => '99853',
                'nama' => 'Mappi',
                'tipe' => 'Kabupaten',
            ),
            274 => 
            array (
                'idkota' => 275,
                'idprovinsi' => 28,
                'kodepos' => '90511',
                'nama' => 'Maros',
                'tipe' => 'Kabupaten',
            ),
            275 => 
            array (
                'idkota' => 276,
                'idprovinsi' => 22,
                'kodepos' => '83131',
                'nama' => 'Mataram',
                'tipe' => 'Kota',
            ),
            276 => 
            array (
                'idkota' => 277,
                'idprovinsi' => 25,
                'kodepos' => '98051',
                'nama' => 'Maybrat',
                'tipe' => 'Kabupaten',
            ),
            277 => 
            array (
                'idkota' => 278,
                'idprovinsi' => 34,
                'kodepos' => '20228',
                'nama' => 'Medan',
                'tipe' => 'Kota',
            ),
            278 => 
            array (
                'idkota' => 279,
                'idprovinsi' => 12,
                'kodepos' => '78619',
                'nama' => 'Melawi',
                'tipe' => 'Kabupaten',
            ),
            279 => 
            array (
                'idkota' => 280,
                'idprovinsi' => 8,
                'kodepos' => '37319',
                'nama' => 'Merangin',
                'tipe' => 'Kabupaten',
            ),
            280 => 
            array (
                'idkota' => 281,
                'idprovinsi' => 24,
                'kodepos' => '99613',
                'nama' => 'Merauke',
                'tipe' => 'Kabupaten',
            ),
            281 => 
            array (
                'idkota' => 282,
                'idprovinsi' => 18,
                'kodepos' => '34911',
                'nama' => 'Mesuji',
                'tipe' => 'Kabupaten',
            ),
            282 => 
            array (
                'idkota' => 283,
                'idprovinsi' => 18,
                'kodepos' => '34111',
                'nama' => 'Metro',
                'tipe' => 'Kota',
            ),
            283 => 
            array (
                'idkota' => 284,
                'idprovinsi' => 24,
                'kodepos' => '99962',
                'nama' => 'Mimika',
                'tipe' => 'Kabupaten',
            ),
            284 => 
            array (
                'idkota' => 285,
                'idprovinsi' => 31,
                'kodepos' => '95614',
                'nama' => 'Minahasa',
                'tipe' => 'Kabupaten',
            ),
            285 => 
            array (
                'idkota' => 286,
                'idprovinsi' => 31,
                'kodepos' => '95914',
                'nama' => 'Minahasa Selatan',
                'tipe' => 'Kabupaten',
            ),
            286 => 
            array (
                'idkota' => 287,
                'idprovinsi' => 31,
                'kodepos' => '95995',
                'nama' => 'Minahasa Tenggara',
                'tipe' => 'Kabupaten',
            ),
            287 => 
            array (
                'idkota' => 288,
                'idprovinsi' => 31,
                'kodepos' => '95316',
                'nama' => 'Minahasa Utara',
                'tipe' => 'Kabupaten',
            ),
            288 => 
            array (
                'idkota' => 289,
                'idprovinsi' => 11,
                'kodepos' => '61382',
                'nama' => 'Mojokerto',
                'tipe' => 'Kabupaten',
            ),
            289 => 
            array (
                'idkota' => 290,
                'idprovinsi' => 11,
                'kodepos' => '61316',
                'nama' => 'Mojokerto',
                'tipe' => 'Kota',
            ),
            290 => 
            array (
                'idkota' => 291,
                'idprovinsi' => 29,
                'kodepos' => '94911',
                'nama' => 'Morowali',
                'tipe' => 'Kabupaten',
            ),
            291 => 
            array (
                'idkota' => 292,
                'idprovinsi' => 33,
                'kodepos' => '31315',
                'nama' => 'Muara Enim',
                'tipe' => 'Kabupaten',
            ),
            292 => 
            array (
                'idkota' => 293,
                'idprovinsi' => 8,
                'kodepos' => '36311',
                'nama' => 'Muaro Jambi',
                'tipe' => 'Kabupaten',
            ),
            293 => 
            array (
                'idkota' => 294,
                'idprovinsi' => 4,
                'kodepos' => '38715',
                'nama' => 'Muko Muko',
                'tipe' => 'Kabupaten',
            ),
            294 => 
            array (
                'idkota' => 295,
                'idprovinsi' => 30,
                'kodepos' => '93611',
                'nama' => 'Muna',
                'tipe' => 'Kabupaten',
            ),
            295 => 
            array (
                'idkota' => 296,
                'idprovinsi' => 14,
                'kodepos' => '73911',
                'nama' => 'Murung Raya',
                'tipe' => 'Kabupaten',
            ),
            296 => 
            array (
                'idkota' => 297,
                'idprovinsi' => 33,
                'kodepos' => '30719',
                'nama' => 'Musi Banyuasin',
                'tipe' => 'Kabupaten',
            ),
            297 => 
            array (
                'idkota' => 298,
                'idprovinsi' => 33,
                'kodepos' => '31661',
                'nama' => 'Musi Rawas',
                'tipe' => 'Kabupaten',
            ),
            298 => 
            array (
                'idkota' => 299,
                'idprovinsi' => 24,
                'kodepos' => '98816',
                'nama' => 'Nabire',
                'tipe' => 'Kabupaten',
            ),
            299 => 
            array (
                'idkota' => 300,
                'idprovinsi' => 21,
                'kodepos' => '23674',
                'nama' => 'Nagan Raya',
                'tipe' => 'Kabupaten',
            ),
            300 => 
            array (
                'idkota' => 301,
                'idprovinsi' => 23,
                'kodepos' => '86911',
                'nama' => 'Nagekeo',
                'tipe' => 'Kabupaten',
            ),
            301 => 
            array (
                'idkota' => 302,
                'idprovinsi' => 17,
                'kodepos' => '29711',
                'nama' => 'Natuna',
                'tipe' => 'Kabupaten',
            ),
            302 => 
            array (
                'idkota' => 303,
                'idprovinsi' => 24,
                'kodepos' => '99541',
                'nama' => 'Nduga',
                'tipe' => 'Kabupaten',
            ),
            303 => 
            array (
                'idkota' => 304,
                'idprovinsi' => 23,
                'kodepos' => '86413',
                'nama' => 'Ngada',
                'tipe' => 'Kabupaten',
            ),
            304 => 
            array (
                'idkota' => 305,
                'idprovinsi' => 11,
                'kodepos' => '64414',
                'nama' => 'Nganjuk',
                'tipe' => 'Kabupaten',
            ),
            305 => 
            array (
                'idkota' => 306,
                'idprovinsi' => 11,
                'kodepos' => '63219',
                'nama' => 'Ngawi',
                'tipe' => 'Kabupaten',
            ),
            306 => 
            array (
                'idkota' => 307,
                'idprovinsi' => 34,
                'kodepos' => '22876',
                'nama' => 'Nias',
                'tipe' => 'Kabupaten',
            ),
            307 => 
            array (
                'idkota' => 308,
                'idprovinsi' => 34,
                'kodepos' => '22895',
                'nama' => 'Nias Barat',
                'tipe' => 'Kabupaten',
            ),
            308 => 
            array (
                'idkota' => 309,
                'idprovinsi' => 34,
                'kodepos' => '22865',
                'nama' => 'Nias Selatan',
                'tipe' => 'Kabupaten',
            ),
            309 => 
            array (
                'idkota' => 310,
                'idprovinsi' => 34,
                'kodepos' => '22856',
                'nama' => 'Nias Utara',
                'tipe' => 'Kabupaten',
            ),
            310 => 
            array (
                'idkota' => 311,
                'idprovinsi' => 16,
                'kodepos' => '77421',
                'nama' => 'Nunukan',
                'tipe' => 'Kabupaten',
            ),
            311 => 
            array (
                'idkota' => 312,
                'idprovinsi' => 33,
                'kodepos' => '30811',
                'nama' => 'Ogan Ilir',
                'tipe' => 'Kabupaten',
            ),
            312 => 
            array (
                'idkota' => 313,
                'idprovinsi' => 33,
                'kodepos' => '30618',
                'nama' => 'Ogan Komering Ilir',
                'tipe' => 'Kabupaten',
            ),
            313 => 
            array (
                'idkota' => 314,
                'idprovinsi' => 33,
                'kodepos' => '32112',
                'nama' => 'Ogan Komering Ulu',
                'tipe' => 'Kabupaten',
            ),
            314 => 
            array (
                'idkota' => 315,
                'idprovinsi' => 33,
                'kodepos' => '32211',
                'nama' => 'Ogan Komering Ulu Selatan',
                'tipe' => 'Kabupaten',
            ),
            315 => 
            array (
                'idkota' => 316,
                'idprovinsi' => 33,
                'kodepos' => '32312',
                'nama' => 'Ogan Komering Ulu Timur',
                'tipe' => 'Kabupaten',
            ),
            316 => 
            array (
                'idkota' => 317,
                'idprovinsi' => 11,
                'kodepos' => '63512',
                'nama' => 'Pacitan',
                'tipe' => 'Kabupaten',
            ),
            317 => 
            array (
                'idkota' => 318,
                'idprovinsi' => 32,
                'kodepos' => '25112',
                'nama' => 'Padang',
                'tipe' => 'Kota',
            ),
            318 => 
            array (
                'idkota' => 319,
                'idprovinsi' => 34,
                'kodepos' => '22763',
                'nama' => 'Padang Lawas',
                'tipe' => 'Kabupaten',
            ),
            319 => 
            array (
                'idkota' => 320,
                'idprovinsi' => 34,
                'kodepos' => '22753',
                'nama' => 'Padang Lawas Utara',
                'tipe' => 'Kabupaten',
            ),
            320 => 
            array (
                'idkota' => 321,
                'idprovinsi' => 32,
                'kodepos' => '27122',
                'nama' => 'Padang Panjang',
                'tipe' => 'Kota',
            ),
            321 => 
            array (
                'idkota' => 322,
                'idprovinsi' => 32,
                'kodepos' => '25583',
                'nama' => 'Padang Pariaman',
                'tipe' => 'Kabupaten',
            ),
            322 => 
            array (
                'idkota' => 323,
                'idprovinsi' => 34,
                'kodepos' => '22727',
                'nama' => 'Padang Sidempuan',
                'tipe' => 'Kota',
            ),
            323 => 
            array (
                'idkota' => 324,
                'idprovinsi' => 33,
                'kodepos' => '31512',
                'nama' => 'Pagar Alam',
                'tipe' => 'Kota',
            ),
            324 => 
            array (
                'idkota' => 325,
                'idprovinsi' => 34,
                'kodepos' => '22272',
                'nama' => 'Pakpak Bharat',
                'tipe' => 'Kabupaten',
            ),
            325 => 
            array (
                'idkota' => 326,
                'idprovinsi' => 14,
                'kodepos' => '73112',
                'nama' => 'Palangka Raya',
                'tipe' => 'Kota',
            ),
            326 => 
            array (
                'idkota' => 327,
                'idprovinsi' => 33,
                'kodepos' => '30111',
                'nama' => 'Palembang',
                'tipe' => 'Kota',
            ),
            327 => 
            array (
                'idkota' => 328,
                'idprovinsi' => 28,
                'kodepos' => '91911',
                'nama' => 'Palopo',
                'tipe' => 'Kota',
            ),
            328 => 
            array (
                'idkota' => 329,
                'idprovinsi' => 29,
                'kodepos' => '94111',
                'nama' => 'Palu',
                'tipe' => 'Kota',
            ),
            329 => 
            array (
                'idkota' => 330,
                'idprovinsi' => 11,
                'kodepos' => '69319',
                'nama' => 'Pamekasan',
                'tipe' => 'Kabupaten',
            ),
            330 => 
            array (
                'idkota' => 331,
                'idprovinsi' => 3,
                'kodepos' => '42212',
                'nama' => 'Pandeglang',
                'tipe' => 'Kabupaten',
            ),
            331 => 
            array (
                'idkota' => 332,
                'idprovinsi' => 9,
                'kodepos' => '46511',
                'nama' => 'Pangandaran',
                'tipe' => 'Kabupaten',
            ),
            332 => 
            array (
                'idkota' => 333,
                'idprovinsi' => 28,
                'kodepos' => '90611',
                'nama' => 'Pangkajene Kepulauan',
                'tipe' => 'Kabupaten',
            ),
            333 => 
            array (
                'idkota' => 334,
                'idprovinsi' => 2,
                'kodepos' => '33115',
                'nama' => 'Pangkal Pinang',
                'tipe' => 'Kota',
            ),
            334 => 
            array (
                'idkota' => 335,
                'idprovinsi' => 24,
                'kodepos' => '98765',
                'nama' => 'Paniai',
                'tipe' => 'Kabupaten',
            ),
            335 => 
            array (
                'idkota' => 336,
                'idprovinsi' => 28,
                'kodepos' => '91123',
                'nama' => 'Parepare',
                'tipe' => 'Kota',
            ),
            336 => 
            array (
                'idkota' => 337,
                'idprovinsi' => 32,
                'kodepos' => '25511',
                'nama' => 'Pariaman',
                'tipe' => 'Kota',
            ),
            337 => 
            array (
                'idkota' => 338,
                'idprovinsi' => 29,
                'kodepos' => '94411',
                'nama' => 'Parigi Moutong',
                'tipe' => 'Kabupaten',
            ),
            338 => 
            array (
                'idkota' => 339,
                'idprovinsi' => 32,
                'kodepos' => '26318',
                'nama' => 'Pasaman',
                'tipe' => 'Kabupaten',
            ),
            339 => 
            array (
                'idkota' => 340,
                'idprovinsi' => 32,
                'kodepos' => '26511',
                'nama' => 'Pasaman Barat',
                'tipe' => 'Kabupaten',
            ),
            340 => 
            array (
                'idkota' => 341,
                'idprovinsi' => 15,
                'kodepos' => '76211',
                'nama' => 'Paser',
                'tipe' => 'Kabupaten',
            ),
            341 => 
            array (
                'idkota' => 342,
                'idprovinsi' => 11,
                'kodepos' => '67153',
                'nama' => 'Pasuruan',
                'tipe' => 'Kabupaten',
            ),
            342 => 
            array (
                'idkota' => 343,
                'idprovinsi' => 11,
                'kodepos' => '67118',
                'nama' => 'Pasuruan',
                'tipe' => 'Kota',
            ),
            343 => 
            array (
                'idkota' => 344,
                'idprovinsi' => 10,
                'kodepos' => '59114',
                'nama' => 'Pati',
                'tipe' => 'Kabupaten',
            ),
            344 => 
            array (
                'idkota' => 345,
                'idprovinsi' => 32,
                'kodepos' => '26213',
                'nama' => 'Payakumbuh',
                'tipe' => 'Kota',
            ),
            345 => 
            array (
                'idkota' => 346,
                'idprovinsi' => 25,
                'kodepos' => '98354',
                'nama' => 'Pegunungan Arfak',
                'tipe' => 'Kabupaten',
            ),
            346 => 
            array (
                'idkota' => 347,
                'idprovinsi' => 24,
                'kodepos' => '99573',
                'nama' => 'Pegunungan Bintang',
                'tipe' => 'Kabupaten',
            ),
            347 => 
            array (
                'idkota' => 348,
                'idprovinsi' => 10,
                'kodepos' => '51161',
                'nama' => 'Pekalongan',
                'tipe' => 'Kabupaten',
            ),
            348 => 
            array (
                'idkota' => 349,
                'idprovinsi' => 10,
                'kodepos' => '51122',
                'nama' => 'Pekalongan',
                'tipe' => 'Kota',
            ),
            349 => 
            array (
                'idkota' => 350,
                'idprovinsi' => 26,
                'kodepos' => '28112',
                'nama' => 'Pekanbaru',
                'tipe' => 'Kota',
            ),
            350 => 
            array (
                'idkota' => 351,
                'idprovinsi' => 26,
                'kodepos' => '28311',
                'nama' => 'Pelalawan',
                'tipe' => 'Kabupaten',
            ),
            351 => 
            array (
                'idkota' => 352,
                'idprovinsi' => 10,
                'kodepos' => '52319',
                'nama' => 'Pemalang',
                'tipe' => 'Kabupaten',
            ),
            352 => 
            array (
                'idkota' => 353,
                'idprovinsi' => 34,
                'kodepos' => '21126',
                'nama' => 'Pematang Siantar',
                'tipe' => 'Kota',
            ),
            353 => 
            array (
                'idkota' => 354,
                'idprovinsi' => 15,
                'kodepos' => '76311',
                'nama' => 'Penajam Paser Utara',
                'tipe' => 'Kabupaten',
            ),
            354 => 
            array (
                'idkota' => 355,
                'idprovinsi' => 18,
                'kodepos' => '35312',
                'nama' => 'Pesawaran',
                'tipe' => 'Kabupaten',
            ),
            355 => 
            array (
                'idkota' => 356,
                'idprovinsi' => 18,
                'kodepos' => '35974',
                'nama' => 'Pesisir Barat',
                'tipe' => 'Kabupaten',
            ),
            356 => 
            array (
                'idkota' => 357,
                'idprovinsi' => 32,
                'kodepos' => '25611',
                'nama' => 'Pesisir Selatan',
                'tipe' => 'Kabupaten',
            ),
            357 => 
            array (
                'idkota' => 358,
                'idprovinsi' => 21,
                'kodepos' => '24116',
                'nama' => 'Pidie',
                'tipe' => 'Kabupaten',
            ),
            358 => 
            array (
                'idkota' => 359,
                'idprovinsi' => 21,
                'kodepos' => '24186',
                'nama' => 'Pidie Jaya',
                'tipe' => 'Kabupaten',
            ),
            359 => 
            array (
                'idkota' => 360,
                'idprovinsi' => 28,
                'kodepos' => '91251',
                'nama' => 'Pinrang',
                'tipe' => 'Kabupaten',
            ),
            360 => 
            array (
                'idkota' => 361,
                'idprovinsi' => 7,
                'kodepos' => '96419',
                'nama' => 'Pohuwato',
                'tipe' => 'Kabupaten',
            ),
            361 => 
            array (
                'idkota' => 362,
                'idprovinsi' => 27,
                'kodepos' => '91311',
                'nama' => 'Polewali Mandar',
                'tipe' => 'Kabupaten',
            ),
            362 => 
            array (
                'idkota' => 363,
                'idprovinsi' => 11,
                'kodepos' => '63411',
                'nama' => 'Ponorogo',
                'tipe' => 'Kabupaten',
            ),
            363 => 
            array (
                'idkota' => 364,
                'idprovinsi' => 12,
                'kodepos' => '78971',
                'nama' => 'Pontianak',
                'tipe' => 'Kabupaten',
            ),
            364 => 
            array (
                'idkota' => 365,
                'idprovinsi' => 12,
                'kodepos' => '78112',
                'nama' => 'Pontianak',
                'tipe' => 'Kota',
            ),
            365 => 
            array (
                'idkota' => 366,
                'idprovinsi' => 29,
                'kodepos' => '94615',
                'nama' => 'Poso',
                'tipe' => 'Kabupaten',
            ),
            366 => 
            array (
                'idkota' => 367,
                'idprovinsi' => 33,
                'kodepos' => '31121',
                'nama' => 'Prabumulih',
                'tipe' => 'Kota',
            ),
            367 => 
            array (
                'idkota' => 368,
                'idprovinsi' => 18,
                'kodepos' => '35719',
                'nama' => 'Pringsewu',
                'tipe' => 'Kabupaten',
            ),
            368 => 
            array (
                'idkota' => 369,
                'idprovinsi' => 11,
                'kodepos' => '67282',
                'nama' => 'Probolinggo',
                'tipe' => 'Kabupaten',
            ),
            369 => 
            array (
                'idkota' => 370,
                'idprovinsi' => 11,
                'kodepos' => '67215',
                'nama' => 'Probolinggo',
                'tipe' => 'Kota',
            ),
            370 => 
            array (
                'idkota' => 371,
                'idprovinsi' => 14,
                'kodepos' => '74811',
                'nama' => 'Pulang Pisau',
                'tipe' => 'Kabupaten',
            ),
            371 => 
            array (
                'idkota' => 372,
                'idprovinsi' => 20,
                'kodepos' => '97771',
                'nama' => 'Pulau Morotai',
                'tipe' => 'Kabupaten',
            ),
            372 => 
            array (
                'idkota' => 373,
                'idprovinsi' => 24,
                'kodepos' => '98981',
                'nama' => 'Puncak',
                'tipe' => 'Kabupaten',
            ),
            373 => 
            array (
                'idkota' => 374,
                'idprovinsi' => 24,
                'kodepos' => '98979',
                'nama' => 'Puncak Jaya',
                'tipe' => 'Kabupaten',
            ),
            374 => 
            array (
                'idkota' => 375,
                'idprovinsi' => 10,
                'kodepos' => '53312',
                'nama' => 'Purbalingga',
                'tipe' => 'Kabupaten',
            ),
            375 => 
            array (
                'idkota' => 376,
                'idprovinsi' => 9,
                'kodepos' => '41119',
                'nama' => 'Purwakarta',
                'tipe' => 'Kabupaten',
            ),
            376 => 
            array (
                'idkota' => 377,
                'idprovinsi' => 10,
                'kodepos' => '54111',
                'nama' => 'Purworejo',
                'tipe' => 'Kabupaten',
            ),
            377 => 
            array (
                'idkota' => 378,
                'idprovinsi' => 25,
                'kodepos' => '98489',
                'nama' => 'Raja Ampat',
                'tipe' => 'Kabupaten',
            ),
            378 => 
            array (
                'idkota' => 379,
                'idprovinsi' => 4,
                'kodepos' => '39112',
                'nama' => 'Rejang Lebong',
                'tipe' => 'Kabupaten',
            ),
            379 => 
            array (
                'idkota' => 380,
                'idprovinsi' => 10,
                'kodepos' => '59219',
                'nama' => 'Rembang',
                'tipe' => 'Kabupaten',
            ),
            380 => 
            array (
                'idkota' => 381,
                'idprovinsi' => 26,
                'kodepos' => '28992',
                'nama' => 'Rokan Hilir',
                'tipe' => 'Kabupaten',
            ),
            381 => 
            array (
                'idkota' => 382,
                'idprovinsi' => 26,
                'kodepos' => '28511',
                'nama' => 'Rokan Hulu',
                'tipe' => 'Kabupaten',
            ),
            382 => 
            array (
                'idkota' => 383,
                'idprovinsi' => 23,
                'kodepos' => '85982',
                'nama' => 'Rote Ndao',
                'tipe' => 'Kabupaten',
            ),
            383 => 
            array (
                'idkota' => 384,
                'idprovinsi' => 21,
                'kodepos' => '23512',
                'nama' => 'Sabang',
                'tipe' => 'Kota',
            ),
            384 => 
            array (
                'idkota' => 385,
                'idprovinsi' => 23,
                'kodepos' => '85391',
                'nama' => 'Sabu Raijua',
                'tipe' => 'Kabupaten',
            ),
            385 => 
            array (
                'idkota' => 386,
                'idprovinsi' => 10,
                'kodepos' => '50711',
                'nama' => 'Salatiga',
                'tipe' => 'Kota',
            ),
            386 => 
            array (
                'idkota' => 387,
                'idprovinsi' => 15,
                'kodepos' => '75133',
                'nama' => 'Samarinda',
                'tipe' => 'Kota',
            ),
            387 => 
            array (
                'idkota' => 388,
                'idprovinsi' => 12,
                'kodepos' => '79453',
                'nama' => 'Sambas',
                'tipe' => 'Kabupaten',
            ),
            388 => 
            array (
                'idkota' => 389,
                'idprovinsi' => 34,
                'kodepos' => '22392',
                'nama' => 'Samosir',
                'tipe' => 'Kabupaten',
            ),
            389 => 
            array (
                'idkota' => 390,
                'idprovinsi' => 11,
                'kodepos' => '69219',
                'nama' => 'Sampang',
                'tipe' => 'Kabupaten',
            ),
            390 => 
            array (
                'idkota' => 391,
                'idprovinsi' => 12,
                'kodepos' => '78557',
                'nama' => 'Sanggau',
                'tipe' => 'Kabupaten',
            ),
            391 => 
            array (
                'idkota' => 392,
                'idprovinsi' => 24,
                'kodepos' => '99373',
                'nama' => 'Sarmi',
                'tipe' => 'Kabupaten',
            ),
            392 => 
            array (
                'idkota' => 393,
                'idprovinsi' => 8,
                'kodepos' => '37419',
                'nama' => 'Sarolangun',
                'tipe' => 'Kabupaten',
            ),
            393 => 
            array (
                'idkota' => 394,
                'idprovinsi' => 32,
                'kodepos' => '27416',
                'nama' => 'Sawah Lunto',
                'tipe' => 'Kota',
            ),
            394 => 
            array (
                'idkota' => 395,
                'idprovinsi' => 12,
                'kodepos' => '79583',
                'nama' => 'Sekadau',
                'tipe' => 'Kabupaten',
            ),
            395 => 
            array (
                'idkota' => 396,
                'idprovinsi' => 28,
                'kodepos' => '92812',
            'nama' => 'Selayar (Kepulauan Selayar)',
                'tipe' => 'Kabupaten',
            ),
            396 => 
            array (
                'idkota' => 397,
                'idprovinsi' => 4,
                'kodepos' => '38811',
                'nama' => 'Seluma',
                'tipe' => 'Kabupaten',
            ),
            397 => 
            array (
                'idkota' => 398,
                'idprovinsi' => 10,
                'kodepos' => '50511',
                'nama' => 'Semarang',
                'tipe' => 'Kabupaten',
            ),
            398 => 
            array (
                'idkota' => 399,
                'idprovinsi' => 10,
                'kodepos' => '50135',
                'nama' => 'Semarang',
                'tipe' => 'Kota',
            ),
            399 => 
            array (
                'idkota' => 400,
                'idprovinsi' => 19,
                'kodepos' => '97561',
                'nama' => 'Seram Bagian Barat',
                'tipe' => 'Kabupaten',
            ),
            400 => 
            array (
                'idkota' => 401,
                'idprovinsi' => 19,
                'kodepos' => '97581',
                'nama' => 'Seram Bagian Timur',
                'tipe' => 'Kabupaten',
            ),
            401 => 
            array (
                'idkota' => 402,
                'idprovinsi' => 3,
                'kodepos' => '42182',
                'nama' => 'Serang',
                'tipe' => 'Kabupaten',
            ),
            402 => 
            array (
                'idkota' => 403,
                'idprovinsi' => 3,
                'kodepos' => '42111',
                'nama' => 'Serang',
                'tipe' => 'Kota',
            ),
            403 => 
            array (
                'idkota' => 404,
                'idprovinsi' => 34,
                'kodepos' => '20915',
                'nama' => 'Serdang Bedagai',
                'tipe' => 'Kabupaten',
            ),
            404 => 
            array (
                'idkota' => 405,
                'idprovinsi' => 14,
                'kodepos' => '74211',
                'nama' => 'Seruyan',
                'tipe' => 'Kabupaten',
            ),
            405 => 
            array (
                'idkota' => 406,
                'idprovinsi' => 26,
                'kodepos' => '28623',
                'nama' => 'Siak',
                'tipe' => 'Kabupaten',
            ),
            406 => 
            array (
                'idkota' => 407,
                'idprovinsi' => 34,
                'kodepos' => '22522',
                'nama' => 'Sibolga',
                'tipe' => 'Kota',
            ),
            407 => 
            array (
                'idkota' => 408,
                'idprovinsi' => 28,
                'kodepos' => '91613',
                'nama' => 'Sidenreng Rappang/Rapang',
                'tipe' => 'Kabupaten',
            ),
            408 => 
            array (
                'idkota' => 409,
                'idprovinsi' => 11,
                'kodepos' => '61219',
                'nama' => 'Sidoarjo',
                'tipe' => 'Kabupaten',
            ),
            409 => 
            array (
                'idkota' => 410,
                'idprovinsi' => 29,
                'kodepos' => '94364',
                'nama' => 'Sigi',
                'tipe' => 'Kabupaten',
            ),
            410 => 
            array (
                'idkota' => 411,
                'idprovinsi' => 32,
                'kodepos' => '27511',
            'nama' => 'Sijunjung (Sawah Lunto Sijunjung)',
                'tipe' => 'Kabupaten',
            ),
            411 => 
            array (
                'idkota' => 412,
                'idprovinsi' => 23,
                'kodepos' => '86121',
                'nama' => 'Sikka',
                'tipe' => 'Kabupaten',
            ),
            412 => 
            array (
                'idkota' => 413,
                'idprovinsi' => 34,
                'kodepos' => '21162',
                'nama' => 'Simalungun',
                'tipe' => 'Kabupaten',
            ),
            413 => 
            array (
                'idkota' => 414,
                'idprovinsi' => 21,
                'kodepos' => '23891',
                'nama' => 'Simeulue',
                'tipe' => 'Kabupaten',
            ),
            414 => 
            array (
                'idkota' => 415,
                'idprovinsi' => 12,
                'kodepos' => '79117',
                'nama' => 'Singkawang',
                'tipe' => 'Kota',
            ),
            415 => 
            array (
                'idkota' => 416,
                'idprovinsi' => 28,
                'kodepos' => '92615',
                'nama' => 'Sinjai',
                'tipe' => 'Kabupaten',
            ),
            416 => 
            array (
                'idkota' => 417,
                'idprovinsi' => 12,
                'kodepos' => '78619',
                'nama' => 'Sintang',
                'tipe' => 'Kabupaten',
            ),
            417 => 
            array (
                'idkota' => 418,
                'idprovinsi' => 11,
                'kodepos' => '68316',
                'nama' => 'Situbondo',
                'tipe' => 'Kabupaten',
            ),
            418 => 
            array (
                'idkota' => 419,
                'idprovinsi' => 5,
                'kodepos' => '55513',
                'nama' => 'Sleman',
                'tipe' => 'Kabupaten',
            ),
            419 => 
            array (
                'idkota' => 420,
                'idprovinsi' => 32,
                'kodepos' => '27365',
                'nama' => 'Solok',
                'tipe' => 'Kabupaten',
            ),
            420 => 
            array (
                'idkota' => 421,
                'idprovinsi' => 32,
                'kodepos' => '27315',
                'nama' => 'Solok',
                'tipe' => 'Kota',
            ),
            421 => 
            array (
                'idkota' => 422,
                'idprovinsi' => 32,
                'kodepos' => '27779',
                'nama' => 'Solok Selatan',
                'tipe' => 'Kabupaten',
            ),
            422 => 
            array (
                'idkota' => 423,
                'idprovinsi' => 28,
                'kodepos' => '90812',
                'nama' => 'Soppeng',
                'tipe' => 'Kabupaten',
            ),
            423 => 
            array (
                'idkota' => 424,
                'idprovinsi' => 25,
                'kodepos' => '98431',
                'nama' => 'Sorong',
                'tipe' => 'Kabupaten',
            ),
            424 => 
            array (
                'idkota' => 425,
                'idprovinsi' => 25,
                'kodepos' => '98411',
                'nama' => 'Sorong',
                'tipe' => 'Kota',
            ),
            425 => 
            array (
                'idkota' => 426,
                'idprovinsi' => 25,
                'kodepos' => '98454',
                'nama' => 'Sorong Selatan',
                'tipe' => 'Kabupaten',
            ),
            426 => 
            array (
                'idkota' => 427,
                'idprovinsi' => 10,
                'kodepos' => '57211',
                'nama' => 'Sragen',
                'tipe' => 'Kabupaten',
            ),
            427 => 
            array (
                'idkota' => 428,
                'idprovinsi' => 9,
                'kodepos' => '41215',
                'nama' => 'Subang',
                'tipe' => 'Kabupaten',
            ),
            428 => 
            array (
                'idkota' => 429,
                'idprovinsi' => 21,
                'kodepos' => '24882',
                'nama' => 'Subulussalam',
                'tipe' => 'Kota',
            ),
            429 => 
            array (
                'idkota' => 430,
                'idprovinsi' => 9,
                'kodepos' => '43311',
                'nama' => 'Sukabumi',
                'tipe' => 'Kabupaten',
            ),
            430 => 
            array (
                'idkota' => 431,
                'idprovinsi' => 9,
                'kodepos' => '43114',
                'nama' => 'Sukabumi',
                'tipe' => 'Kota',
            ),
            431 => 
            array (
                'idkota' => 432,
                'idprovinsi' => 14,
                'kodepos' => '74712',
                'nama' => 'Sukamara',
                'tipe' => 'Kabupaten',
            ),
            432 => 
            array (
                'idkota' => 433,
                'idprovinsi' => 10,
                'kodepos' => '57514',
                'nama' => 'Sukoharjo',
                'tipe' => 'Kabupaten',
            ),
            433 => 
            array (
                'idkota' => 434,
                'idprovinsi' => 23,
                'kodepos' => '87219',
                'nama' => 'Sumba Barat',
                'tipe' => 'Kabupaten',
            ),
            434 => 
            array (
                'idkota' => 435,
                'idprovinsi' => 23,
                'kodepos' => '87453',
                'nama' => 'Sumba Barat Daya',
                'tipe' => 'Kabupaten',
            ),
            435 => 
            array (
                'idkota' => 436,
                'idprovinsi' => 23,
                'kodepos' => '87358',
                'nama' => 'Sumba Tengah',
                'tipe' => 'Kabupaten',
            ),
            436 => 
            array (
                'idkota' => 437,
                'idprovinsi' => 23,
                'kodepos' => '87112',
                'nama' => 'Sumba Timur',
                'tipe' => 'Kabupaten',
            ),
            437 => 
            array (
                'idkota' => 438,
                'idprovinsi' => 22,
                'kodepos' => '84315',
                'nama' => 'Sumbawa',
                'tipe' => 'Kabupaten',
            ),
            438 => 
            array (
                'idkota' => 439,
                'idprovinsi' => 22,
                'kodepos' => '84419',
                'nama' => 'Sumbawa Barat',
                'tipe' => 'Kabupaten',
            ),
            439 => 
            array (
                'idkota' => 440,
                'idprovinsi' => 9,
                'kodepos' => '45326',
                'nama' => 'Sumedang',
                'tipe' => 'Kabupaten',
            ),
            440 => 
            array (
                'idkota' => 441,
                'idprovinsi' => 11,
                'kodepos' => '69413',
                'nama' => 'Sumenep',
                'tipe' => 'Kabupaten',
            ),
            441 => 
            array (
                'idkota' => 442,
                'idprovinsi' => 8,
                'kodepos' => '37113',
                'nama' => 'Sungaipenuh',
                'tipe' => 'Kota',
            ),
            442 => 
            array (
                'idkota' => 443,
                'idprovinsi' => 24,
                'kodepos' => '98164',
                'nama' => 'Supiori',
                'tipe' => 'Kabupaten',
            ),
            443 => 
            array (
                'idkota' => 444,
                'idprovinsi' => 11,
                'kodepos' => '60119',
                'nama' => 'Surabaya',
                'tipe' => 'Kota',
            ),
            444 => 
            array (
                'idkota' => 445,
                'idprovinsi' => 10,
                'kodepos' => '57113',
            'nama' => 'Surakarta (Solo)',
                'tipe' => 'Kota',
            ),
            445 => 
            array (
                'idkota' => 446,
                'idprovinsi' => 13,
                'kodepos' => '71513',
                'nama' => 'Tabalong',
                'tipe' => 'Kabupaten',
            ),
            446 => 
            array (
                'idkota' => 447,
                'idprovinsi' => 1,
                'kodepos' => '82119',
                'nama' => 'Tabanan',
                'tipe' => 'Kabupaten',
            ),
            447 => 
            array (
                'idkota' => 448,
                'idprovinsi' => 28,
                'kodepos' => '92212',
                'nama' => 'Takalar',
                'tipe' => 'Kabupaten',
            ),
            448 => 
            array (
                'idkota' => 449,
                'idprovinsi' => 25,
                'kodepos' => '98475',
                'nama' => 'Tambrauw',
                'tipe' => 'Kabupaten',
            ),
            449 => 
            array (
                'idkota' => 450,
                'idprovinsi' => 16,
                'kodepos' => '77611',
                'nama' => 'Tana Tidung',
                'tipe' => 'Kabupaten',
            ),
            450 => 
            array (
                'idkota' => 451,
                'idprovinsi' => 28,
                'kodepos' => '91819',
                'nama' => 'Tana Toraja',
                'tipe' => 'Kabupaten',
            ),
            451 => 
            array (
                'idkota' => 452,
                'idprovinsi' => 13,
                'kodepos' => '72211',
                'nama' => 'Tanah Bumbu',
                'tipe' => 'Kabupaten',
            ),
            452 => 
            array (
                'idkota' => 453,
                'idprovinsi' => 32,
                'kodepos' => '27211',
                'nama' => 'Tanah Datar',
                'tipe' => 'Kabupaten',
            ),
            453 => 
            array (
                'idkota' => 454,
                'idprovinsi' => 13,
                'kodepos' => '70811',
                'nama' => 'Tanah Laut',
                'tipe' => 'Kabupaten',
            ),
            454 => 
            array (
                'idkota' => 455,
                'idprovinsi' => 3,
                'kodepos' => '15914',
                'nama' => 'Tangerang',
                'tipe' => 'Kabupaten',
            ),
            455 => 
            array (
                'idkota' => 456,
                'idprovinsi' => 3,
                'kodepos' => '15111',
                'nama' => 'Tangerang',
                'tipe' => 'Kota',
            ),
            456 => 
            array (
                'idkota' => 457,
                'idprovinsi' => 3,
                'kodepos' => '15332',
                'nama' => 'Tangerang Selatan',
                'tipe' => 'Kota',
            ),
            457 => 
            array (
                'idkota' => 458,
                'idprovinsi' => 18,
                'kodepos' => '35619',
                'nama' => 'Tanggamus',
                'tipe' => 'Kabupaten',
            ),
            458 => 
            array (
                'idkota' => 459,
                'idprovinsi' => 34,
                'kodepos' => '21321',
                'nama' => 'Tanjung Balai',
                'tipe' => 'Kota',
            ),
            459 => 
            array (
                'idkota' => 460,
                'idprovinsi' => 8,
                'kodepos' => '36513',
                'nama' => 'Tanjung Jabung Barat',
                'tipe' => 'Kabupaten',
            ),
            460 => 
            array (
                'idkota' => 461,
                'idprovinsi' => 8,
                'kodepos' => '36719',
                'nama' => 'Tanjung Jabung Timur',
                'tipe' => 'Kabupaten',
            ),
            461 => 
            array (
                'idkota' => 462,
                'idprovinsi' => 17,
                'kodepos' => '29111',
                'nama' => 'Tanjung Pinang',
                'tipe' => 'Kota',
            ),
            462 => 
            array (
                'idkota' => 463,
                'idprovinsi' => 34,
                'kodepos' => '22742',
                'nama' => 'Tapanuli Selatan',
                'tipe' => 'Kabupaten',
            ),
            463 => 
            array (
                'idkota' => 464,
                'idprovinsi' => 34,
                'kodepos' => '22611',
                'nama' => 'Tapanuli Tengah',
                'tipe' => 'Kabupaten',
            ),
            464 => 
            array (
                'idkota' => 465,
                'idprovinsi' => 34,
                'kodepos' => '22414',
                'nama' => 'Tapanuli Utara',
                'tipe' => 'Kabupaten',
            ),
            465 => 
            array (
                'idkota' => 466,
                'idprovinsi' => 13,
                'kodepos' => '71119',
                'nama' => 'Tapin',
                'tipe' => 'Kabupaten',
            ),
            466 => 
            array (
                'idkota' => 467,
                'idprovinsi' => 16,
                'kodepos' => '77114',
                'nama' => 'Tarakan',
                'tipe' => 'Kota',
            ),
            467 => 
            array (
                'idkota' => 468,
                'idprovinsi' => 9,
                'kodepos' => '46411',
                'nama' => 'Tasikmalaya',
                'tipe' => 'Kabupaten',
            ),
            468 => 
            array (
                'idkota' => 469,
                'idprovinsi' => 9,
                'kodepos' => '46116',
                'nama' => 'Tasikmalaya',
                'tipe' => 'Kota',
            ),
            469 => 
            array (
                'idkota' => 470,
                'idprovinsi' => 34,
                'kodepos' => '20632',
                'nama' => 'Tebing Tinggi',
                'tipe' => 'Kota',
            ),
            470 => 
            array (
                'idkota' => 471,
                'idprovinsi' => 8,
                'kodepos' => '37519',
                'nama' => 'Tebo',
                'tipe' => 'Kabupaten',
            ),
            471 => 
            array (
                'idkota' => 472,
                'idprovinsi' => 10,
                'kodepos' => '52419',
                'nama' => 'Tegal',
                'tipe' => 'Kabupaten',
            ),
            472 => 
            array (
                'idkota' => 473,
                'idprovinsi' => 10,
                'kodepos' => '52114',
                'nama' => 'Tegal',
                'tipe' => 'Kota',
            ),
            473 => 
            array (
                'idkota' => 474,
                'idprovinsi' => 25,
                'kodepos' => '98551',
                'nama' => 'Teluk Bintuni',
                'tipe' => 'Kabupaten',
            ),
            474 => 
            array (
                'idkota' => 475,
                'idprovinsi' => 25,
                'kodepos' => '98591',
                'nama' => 'Teluk Wondama',
                'tipe' => 'Kabupaten',
            ),
            475 => 
            array (
                'idkota' => 476,
                'idprovinsi' => 10,
                'kodepos' => '56212',
                'nama' => 'Temanggung',
                'tipe' => 'Kabupaten',
            ),
            476 => 
            array (
                'idkota' => 477,
                'idprovinsi' => 20,
                'kodepos' => '97714',
                'nama' => 'Ternate',
                'tipe' => 'Kota',
            ),
            477 => 
            array (
                'idkota' => 478,
                'idprovinsi' => 20,
                'kodepos' => '97815',
                'nama' => 'Tidore Kepulauan',
                'tipe' => 'Kota',
            ),
            478 => 
            array (
                'idkota' => 479,
                'idprovinsi' => 23,
                'kodepos' => '85562',
                'nama' => 'Timor Tengah Selatan',
                'tipe' => 'Kabupaten',
            ),
            479 => 
            array (
                'idkota' => 480,
                'idprovinsi' => 23,
                'kodepos' => '85612',
                'nama' => 'Timor Tengah Utara',
                'tipe' => 'Kabupaten',
            ),
            480 => 
            array (
                'idkota' => 481,
                'idprovinsi' => 34,
                'kodepos' => '22316',
                'nama' => 'Toba Samosir',
                'tipe' => 'Kabupaten',
            ),
            481 => 
            array (
                'idkota' => 482,
                'idprovinsi' => 29,
                'kodepos' => '94683',
                'nama' => 'Tojo Una-Una',
                'tipe' => 'Kabupaten',
            ),
            482 => 
            array (
                'idkota' => 483,
                'idprovinsi' => 29,
                'kodepos' => '94542',
                'nama' => 'Toli-Toli',
                'tipe' => 'Kabupaten',
            ),
            483 => 
            array (
                'idkota' => 484,
                'idprovinsi' => 24,
                'kodepos' => '99411',
                'nama' => 'Tolikara',
                'tipe' => 'Kabupaten',
            ),
            484 => 
            array (
                'idkota' => 485,
                'idprovinsi' => 31,
                'kodepos' => '95416',
                'nama' => 'Tomohon',
                'tipe' => 'Kota',
            ),
            485 => 
            array (
                'idkota' => 486,
                'idprovinsi' => 28,
                'kodepos' => '91831',
                'nama' => 'Toraja Utara',
                'tipe' => 'Kabupaten',
            ),
            486 => 
            array (
                'idkota' => 487,
                'idprovinsi' => 11,
                'kodepos' => '66312',
                'nama' => 'Trenggalek',
                'tipe' => 'Kabupaten',
            ),
            487 => 
            array (
                'idkota' => 488,
                'idprovinsi' => 19,
                'kodepos' => '97612',
                'nama' => 'Tual',
                'tipe' => 'Kota',
            ),
            488 => 
            array (
                'idkota' => 489,
                'idprovinsi' => 11,
                'kodepos' => '62319',
                'nama' => 'Tuban',
                'tipe' => 'Kabupaten',
            ),
            489 => 
            array (
                'idkota' => 490,
                'idprovinsi' => 18,
                'kodepos' => '34613',
                'nama' => 'Tulang Bawang',
                'tipe' => 'Kabupaten',
            ),
            490 => 
            array (
                'idkota' => 491,
                'idprovinsi' => 18,
                'kodepos' => '34419',
                'nama' => 'Tulang Bawang Barat',
                'tipe' => 'Kabupaten',
            ),
            491 => 
            array (
                'idkota' => 492,
                'idprovinsi' => 11,
                'kodepos' => '66212',
                'nama' => 'Tulungagung',
                'tipe' => 'Kabupaten',
            ),
            492 => 
            array (
                'idkota' => 493,
                'idprovinsi' => 28,
                'kodepos' => '90911',
                'nama' => 'Wajo',
                'tipe' => 'Kabupaten',
            ),
            493 => 
            array (
                'idkota' => 494,
                'idprovinsi' => 30,
                'kodepos' => '93791',
                'nama' => 'Wakatobi',
                'tipe' => 'Kabupaten',
            ),
            494 => 
            array (
                'idkota' => 495,
                'idprovinsi' => 24,
                'kodepos' => '98269',
                'nama' => 'Waropen',
                'tipe' => 'Kabupaten',
            ),
            495 => 
            array (
                'idkota' => 496,
                'idprovinsi' => 18,
                'kodepos' => '34711',
                'nama' => 'Way Kanan',
                'tipe' => 'Kabupaten',
            ),
            496 => 
            array (
                'idkota' => 497,
                'idprovinsi' => 10,
                'kodepos' => '57619',
                'nama' => 'Wonogiri',
                'tipe' => 'Kabupaten',
            ),
            497 => 
            array (
                'idkota' => 498,
                'idprovinsi' => 10,
                'kodepos' => '56311',
                'nama' => 'Wonosobo',
                'tipe' => 'Kabupaten',
            ),
            498 => 
            array (
                'idkota' => 499,
                'idprovinsi' => 24,
                'kodepos' => '99041',
                'nama' => 'Yahukimo',
                'tipe' => 'Kabupaten',
            ),
            499 => 
            array (
                'idkota' => 500,
                'idprovinsi' => 24,
                'kodepos' => '99481',
                'nama' => 'Yalimo',
                'tipe' => 'Kabupaten',
            ),
        ));
        \DB::table('kota')->insert(array (
            0 => 
            array (
                'idkota' => 501,
                'idprovinsi' => 5,
                'kodepos' => '55111',
                'nama' => 'Yogyakarta',
                'tipe' => 'Kota',
            ),
        ));
        
        
    }
}