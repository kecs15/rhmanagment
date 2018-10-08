<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $fillable = ['nombre', 'cedula', 'salario_aspira'];

    public function idiomas()
    {
        return $this->belongsToMany('App\Idioma', 'candidato_idioma')->withPivot(['idioma_id', 'candidato_id', 'nivel']);
    }
}
