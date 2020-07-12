<?php

namespace App\Http\Controllers;

use App\Receta;
use App\CategoriaReceta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    //
    public function index(){

        //Ordenar por recetas mas votadas
        // $votadas = Receta::has('likes', '>', 1)->get();

        $votadas = Receta::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();

        //conseguir las ultimas recetas
        $nuevas = Receta::latest()->take(5)->get();

        //conseguir las recetas por categoria
        $categorias = CategoriaReceta::All();
        $recetas = [];

        foreach($categorias as $categoria){
            $recetas[Str::slug($categoria->nombre) ][] = Receta::where('categoria_id', $categoria->id)->take(3)->get();
        }
        

        return view('inicio.index', compact('nuevas', 'recetas', 'votadas'));
    }
}
