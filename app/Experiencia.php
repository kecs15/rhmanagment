<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    protected $fillable = ['empresa', 'puesto', 'salario', 'desde', 'hasta'];

    public function candidato()
    {
        return $this->belongsTo('App\Candidato');
    }
}
