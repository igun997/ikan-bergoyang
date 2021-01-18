<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersDetailTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users_detail')->delete();
        
        \DB::table('users_detail')->insert(array (
            0 => 
            array (
                'alamat' => '-',
                'idkota' => 1,
                'idprovinsi' => 1,
                'iduser' => 1,
                'telepon' => NULL,
            ),
            1 => 
            array (
                'alamat' => 'Alamat lengkap di bandung',
                'idkota' => 22,
                'idprovinsi' => 9,
                'iduser' => 26,
                'telepon' => '083120501577',
            ),
            2 => 
            array (
                'alamat' => 'Jl. Otitsta, Gg.Anggrek',
                'idkota' => 428,
                'idprovinsi' => 9,
                'iduser' => 27,
                'telepon' => '081320573156229',
            ),
            3 => 
            array (
                'alamat' => 'bandung',
                'idkota' => 23,
                'idprovinsi' => 9,
                'iduser' => 28,
                'telepon' => '081386542777',
            ),
            4 => 
            array (
                'alamat' => 'bandung',
                'idkota' => 22,
                'idprovinsi' => 9,
                'iduser' => 29,
                'telepon' => '081386542778',
            ),
            5 => 
            array (
                'alamat' => '-',
                'idkota' => 1,
                'idprovinsi' => 1,
                'iduser' => 30,
                'telepon' => NULL,
            ),
            6 => 
            array (
                'alamat' => '-',
                'idkota' => 1,
                'idprovinsi' => 1,
                'iduser' => 31,
                'telepon' => NULL,
            ),
            7 => 
            array (
                'alamat' => 'Banjar',
                'idkota' => 17,
                'idprovinsi' => 1,
                'iduser' => 34,
                'telepon' => '081214267695',
            ),
        ));
        
        
    }
}