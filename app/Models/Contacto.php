<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nombre', 
        'ap_paterno', 
        'ap_materno', 
        'fecha_nacimiento', 
        'alias'
    ];

    public function emails()
    {
        return $this->hasMany(Email::class, 'contacto_id');
    }

    public function direciones()
    {
        return $this->hasMany(Direccion::class, 'contacto_id');
    }

    public function telefonos()
    {
        return $this->hasMany(Telefono::class, 'contacto_id');
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class, 'contacto_id');
    }

}
