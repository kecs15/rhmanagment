<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
    protected  $table = 'capacitaciones';
    protected $fillable = ['descripcion', 'institucion', 'nivel', 'desde', 'hasta'];

    public function candidatos()
    {
        return $this->belongsTo('App\Candidato');
    }
}
