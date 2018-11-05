<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $fillable = ['nombre', 
                           'nivel_riesgo',
                           'salario_maximo',
                           'salario_minimo',
                           'estado',
                           'departamento_id'
                        ];

    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }

    public function candidatos()
    {
        return $this->hasMany('App\Candidato');
    }
}
