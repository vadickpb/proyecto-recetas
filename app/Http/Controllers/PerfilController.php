<?php

namespace App\Http\Controllers;

use App\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //retornar vist
        return view('perfiles.show')->with('perfil', $perfil);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        //
        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {

        //Validar
        $data = request()->validate([
            'nombre' => 'required',
            'url' => 'required',
            'biografia' => 'required'
        ]);

        //si el usuario sube una imagen
        if($request['imagen']){
            //obtener la ruta de la imagen
            $ruta_imagen = $request['imagen']->store('upload-perfiles', 'public');

            //Resize de la imagen
            $img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(600, 600);
            $img->save();

            //crear un arreglo de imagen
            $array_imagen = ['imagen' => $ruta_imagen];
        }
        
        //Asignar nombre y URL
        auth()->user()->name = $data['nombre'];
        auth()->user()->url = $data['url'];
        auth()->user()->save();

        //eliminar url y name de data
        unset($data['url']);
        unset($data['nombre']);

        //Asignar Biografia e imagen
        auth()->user()->perfil()->update( array_merge(
            $data,
            $array_imagen ?? []
        )  );

        //redireccionar
        return redirect()->action('RecetaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
