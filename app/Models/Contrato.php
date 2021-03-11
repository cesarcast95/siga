<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = "carreras";
    protected $fillable = ['entrevista_id', 'fecha_inicio', 'fecha_retiro'];
    public $timestamps = false;

    public function entrevista()
    {
        return $this->belongsTo(Entrevista::class, 'entrevista_id');
    }
    public function suspensiones()
    {
        return $this->hasMany(Suspension::class);
    }

}
