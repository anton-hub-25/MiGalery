<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;


    protected $table='categoria'; // Nombre de la tabla.

    protected $primaryKey='id';//LLave primaria de la tabla

    public $timestamps=false; //No crear columnas para el registro de las modificaciones en la tabla.


    // Especificamos en el array[] los campos que van a recibir un valor en la BD.
    protected $fillable =[
    	'categoria',
        'descripcion'
    ];

    protected $guarded =[

    ];

}
