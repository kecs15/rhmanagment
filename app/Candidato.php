<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $fillable = ['nombre', 'cedula', 'salario_aspira'];

    public function idiomas()
    {
        return $this->belongsToMany('App\Idioma', 'candidato_idioma')->withPivot('nivel');
    }

    public function competencias()
    {
        return $this->belongsToMany('App\Competencia', 'candidato_competencia');
    }

    public function capacitaciones()
    {
        return $this->hasMany('App\Capacitacion');
    }

    public function experiencias()
    {
        return $this->hasMany('App\Experiencia');
    }

    public function puesto()
    {
        return $this->belongsTo('App\Puesto');
    }
}
