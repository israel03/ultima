<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DatosClientes extends Model
{
    use SoftDeletes;

    protected $table = 'datos_clientes';

    protected $fillable = [
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'domicilio',
        'correo_electronico',
    ];
}
