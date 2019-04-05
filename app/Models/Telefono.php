<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'contacto_id', 
        'telefono',
        'descripcion'
    ];

}
