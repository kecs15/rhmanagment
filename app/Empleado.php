<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = ['nombre', 'cedula', 'salario', 'puesto_id'];

    public function puesto()
    {
        return $this->belongsTo('App\Puesto');
    }
}
