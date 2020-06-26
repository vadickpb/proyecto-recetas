<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_receta')->insert([
           'nombre'=>'Comida Mexicana',
           'created_at' => date('Y-m-d H:m-:'),
           'updated_at' => date('Y-m-d H:m-:')
        ]);
        
        DB::table('categoria_receta')->insert([
            'nombre'=>'Comida Peruana',
            'created_at' => date('Y-m-d H:m-:'),
            'updated_at' => date('Y-m-d H:m-:')
         ]);

         DB::table('categoria_receta')->insert([
            'nombre'=>'Comida Italiana',
            'created_at' => date('Y-m-d H:m-:'),
            'updated_at' => date('Y-m-d H:m-:')
         ]);

         DB::table('categoria_receta')->insert([
            'nombre'=>'Postres',
            'created_at' => date('Y-m-d H:m-:'),
            'updated_at' => date('Y-m-d H:m-:')
         ]);

         DB::table('categoria_receta')->insert([
            'nombre'=>'Ensaladas',
            'created_at' => date('Y-m-d H:m-:'),
            'updated_at' => date('Y-m-d H:m-:')
         ]);

         DB::table('categoria_receta')->insert([
            'nombre'=>'Desayunos',
            'created_at' => date('Y-m-d H:m-:'),
            'updated_at' => date('Y-m-d H:m-:')
         ]);
    }
}
