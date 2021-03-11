<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrevista extends Model
{
    protected $table = "entrevista";
    protected $fillable = ['estado', 'cupos_id', 'prueba_id', 'fecha_entrevista', 'hora_entrevista', 'calificacion'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function cupos()
    {
        return $this->belongsTo(Cupos::class, 'cupos_id');
    }
    public function prueba()
    {
        return $this->belongsTo(Prueba::class, 'prueba_id');
    }

}
