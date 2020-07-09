<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{

    //campos que se agregaran
    protected $fillable = [
        'titulo', 'preparacion', 'ingredientes', 'imagen', 'categoria_id'
    ];

    // Obtiene la categoria de la receta via llave foranea
    public function categoria()
    {
        return $this->belongsTo(CategoriaReceta::class);
    }
    
    //Obtiene la relacion con el usuario vía fk
    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //likes que recibió una receta
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes_receta');
    }
}
