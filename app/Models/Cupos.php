<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cupos extends Model
{
    protected $table = "cupos";
    protected $fillable = ['area_id', 'empleado_id', 'empresa_id', 'estado', 'cantidad_cupos'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
    public function entrevistas()
    {
        return $this->hasMany(Entrevista::class);
    }
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
}
