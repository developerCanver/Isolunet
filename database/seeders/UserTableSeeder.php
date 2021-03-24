<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminsitrador = User::create([
        	'name' 		=> 'Crhistian Davud Vargas',
        	'email'		=> 'cristian-d-2@hotmail.com',
        	'password' 	=>  bcrypt('cristian91'),
        ]);

        $adminsitrador->assignRole('super-admin');
    }
}
