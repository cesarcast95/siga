<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
   
    protected $table = "carreras";
    protected $fillable = ['area_conocimiento', 'nbc', 'programa', 'institucion', 'municipio', 'departamento', 'nivel_formacion'];
    protected $guarded = ['id'];
    public $timestamps = false;



}
