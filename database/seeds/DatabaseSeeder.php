<?php

use Illuminate\Database\Seeder;
use App\Acara;
use App\Transaksi;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Acara::class,200)->create();
        //factory(Transaksi::class,200)->create();
    }
}
