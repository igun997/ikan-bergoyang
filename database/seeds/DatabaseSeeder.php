<?php

use Database\Seeders\KotaTableSeeder;
use Database\Seeders\ProvinsiTableSeeder;
use Database\Seeders\UsersDetailTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(ProvinsiTableSeeder::class);
        $this->call(KotaTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UsersDetailTableSeeder::class);
    }
}
