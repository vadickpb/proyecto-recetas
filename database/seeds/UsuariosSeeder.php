<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'vadick',
            'email'=>'vadick@vadick.com',
            'password'=>Hash::make('12345678'),
            'url'=>'http://recetasvadick.com',
        ]);


        $user2 = User::create([
            'name'=>'david',
            'email'=>'david@david.com',
            'password'=>Hash::make('12345678'),
            'url'=>'http://comidacondavid.com',
        ]);



        

         
    }
}
