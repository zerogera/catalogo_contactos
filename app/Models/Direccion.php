<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direciones'; // Se asigna un nombre manualemnte de la tabla
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'contacto_id', 
        'direccion'
    ];

}
