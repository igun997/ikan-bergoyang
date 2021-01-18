<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'created_at' => '2019-08-02 15:16:39',
                'deleted_at' => NULL,
                'email' => 'pemilik@gmail.com',
                'id' => 1,
                'level' => 1,
                'nama' => 'Agung',
                'password' => 'pemilik',
                'remember_token' => NULL,
                'updated_at' => '2020-12-08 22:44:07',
            ),
            1 => 
            array (
                'created_at' => '2020-11-11 18:32:11',
                'deleted_at' => NULL,
                'email' => 'riwandindi17@gmail.com',
                'id' => 26,
                'level' => 2,
                'nama' => 'Muhammad Riwandi',
                'password' => '12345678',
                'remember_token' => NULL,
                'updated_at' => '2020-11-12 09:42:06',
            ),
            2 => 
            array (
                'created_at' => '2020-12-02 13:12:40',
                'deleted_at' => NULL,
                'email' => 'agung@gmail.com',
                'id' => 27,
                'level' => 2,
                'nama' => 'Agung',
                'password' => 'agung1234',
                'remember_token' => NULL,
                'updated_at' => '2020-12-02 13:12:40',
            ),
            3 => 
            array (
                'created_at' => '2020-12-17 15:43:25',
                'deleted_at' => NULL,
                'email' => 'yuigahamayuri@gmail.com',
                'id' => 28,
                'level' => 2,
                'nama' => 'Hana',
                'password' => 'password',
                'remember_token' => NULL,
                'updated_at' => '2020-12-17 15:44:31',
            ),
            4 => 
            array (
                'created_at' => '2020-12-25 13:31:35',
                'deleted_at' => NULL,
                'email' => 'akimotoyoda@gmail.com',
                'id' => 29,
                'level' => 2,
                'nama' => 'yoda',
                'password' => 'password',
                'remember_token' => NULL,
                'updated_at' => '2020-12-25 13:31:35',
            ),
            5 => 
            array (
                'created_at' => '2021-01-01 09:37:04',
                'deleted_at' => NULL,
                'email' => 'admingudang@gmail.com',
                'id' => 30,
                'level' => 3,
                'nama' => 'Gudang',
                'password' => 'admingudang',
                'remember_token' => NULL,
                'updated_at' => '2021-01-01 09:37:19',
            ),
            6 => 
            array (
                'created_at' => '2021-01-01 09:37:12',
                'deleted_at' => NULL,
                'email' => 'adminpenjualan@gmail.com',
                'id' => 31,
                'level' => 4,
                'nama' => 'Penjualan',
                'password' => 'adminpenjualan',
                'remember_token' => NULL,
                'updated_at' => '2021-01-01 09:37:24',
            ),
            7 => 
            array (
                'created_at' => '2021-01-01 18:44:32',
                'deleted_at' => NULL,
                'email' => 'rie@gmail.com',
                'id' => 32,
                'level' => 3,
                'nama' => 'rie',
                'password' => 'password',
                'remember_token' => NULL,
                'updated_at' => '2021-01-01 18:44:32',
            ),
            8 => 
            array (
                'created_at' => '2021-01-01 18:45:21',
                'deleted_at' => NULL,
                'email' => 'fisc@gmail.com',
                'id' => 33,
                'level' => 4,
                'nama' => 'fisc',
                'password' => 'password',
                'remember_token' => NULL,
                'updated_at' => '2021-01-01 18:45:21',
            ),
            9 => 
            array (
                'created_at' => '2021-01-18 23:26:15',
                'deleted_at' => NULL,
                'email' => 'indra.gunanda@gmail.com',
                'id' => 34,
                'level' => 2,
                'nama' => 'Indra Gunanda',
                'password' => 'indra290997',
                'remember_token' => NULL,
                'updated_at' => '2021-01-18 23:26:15',
            ),
        ));
        
        
    }
}