<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //find the fst user with this email
        $user = User::where('email', 'josherias10@gmail.com')->first();


        //if user isnt in bd, the create one
        User::create([
            'name' => 'Josh Erias',
            'email' => 'josherias10@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('kauthara10')
        ]);
    }
}
