<?php

namespace App\Http\Controllers;

use App\Receta;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class LikesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //Almacena los datos del usuario a una receta
        return auth()->user()->meGusta()->toggle($receta);
    }

    
}
