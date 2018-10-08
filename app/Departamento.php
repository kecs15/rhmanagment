<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = ['nombre', 'estado'];

    /**
     * Get the comments for the blog post.
     */
    public function puestos()
    {
        return $this->hasMany('App\Puesto');
    }
}