<?php

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
        DB::table('users')->insert([
            'name'=>'vadick',
            'email'=>'vadick@vadick.com',
            'password'=>Hash::make('12345678'),
            'url'=>'http://recetasvadick.com',
            'created_at' => date('Y-m-d H:m-:'),
            'updated_at' => date('Y-m-d H:m-:')
         ]);

         DB::table('users')->insert([
            'name'=>'david',
            'email'=>'david@david.com',
            'password'=>Hash::make('12345678'),
            'url'=>'http://comidadavid.com',
            'created_at' => date('Y-m-d H:m-:'),
            'updated_at' => date('Y-m-d H:m-:')
         ]);
    }
}
