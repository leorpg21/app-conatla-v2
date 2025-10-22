<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direcciones';

    protected $fillable = [
        'municipio',
        'corregimiento',
        'barrio',
        'direccion',
        'beneficiario_id'
    ];

    public $timestamps = false; 
}
