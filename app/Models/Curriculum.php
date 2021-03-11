<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = "curriculum";
    protected $fillable = ['cedula', 
                           'nombre', 
                           'sexo', 
                           'email', 
                           'telefono', 
                           'grado_academico', 
                           'carrera_id', 
                           'fecha_disposicion',
                           'disponibilidad',
                           'recomendado',
                           'empleado_id',
                           'parentesco',
                           'planta',
                           'obervacion',
                           'estado_prueba'];
 
    public $timestamps = false;

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    public function pruebas()
    {
        return $this->hasMany(Prueba::class);
    }

}