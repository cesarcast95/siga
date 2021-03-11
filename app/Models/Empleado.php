<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = "empleados";
    protected $fillable = [
                            'no_personal',
                            'cedula',
                            'nombre',
                            'cargo'
                        ];
    protected $guarded = ['id'];
    public $timestamps = false;
}
