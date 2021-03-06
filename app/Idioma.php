<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    protected $fillable = ['nombre', 'estado'];

    public function candidatos()
    {
        return $this->belongsToMany('App\Candidato');
    }
}
