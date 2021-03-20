<?php

use Illuminate\Database\Seeder;
use App\User;
use Hash as Bcrypt;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
	        	'name' => 'Ahmad',
	        	'email' => 'admin@gmail.com',
	        	'password' => Bcrypt::make('123456'),
	        	'photo' => 'Null',
	        	'id_outlet' => '1',
	        	'status' => '1',
        	]);
        $user->assignRole(['admin']);
    	
    	$kasir = User::create([
	        	'name' => 'Saifud',
	        	'email' => 'kasir@gmail.com',
	        	'password' => Bcrypt::make('123456'),
	        	'photo' => 'Null',
	        	'id_outlet' => '1',
	        	'status' => '1',
        	]);
         $kasir->assignRole(['kasir']);

         $outlet = User::create([
	        	'name' => 'Anang',
	        	'email' => 'outlet@gmail.com',
	        	'password' => Bcrypt::make('123456'),
	        	'photo' => 'Null',
	        	'id_outlet' => '1',
	        	'status' => '1',
        	]);
         $outlet->assignRole(['owner']);
    }
}
