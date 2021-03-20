<?php

use Illuminate\Database\Seeder;
use App\Outlet;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = new Outlet;
        $init->nama = "contoh";
        $init->alamat = "Blingoh RT 01 RW 01";
        $init->telepon = "08892370929";
        $init->save();
    }
}
