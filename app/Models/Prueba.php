<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    protected $table = "respuesta_pruebas";
    protected $fillable = ['curriculum_id', 
                            'resultado', 
                            'created_at', 
                            'updated_at', 
                            'estado_envio', 
                            'psicometria_ratio', 
                            'psicometria_descripcion', 
                            'competencias_ratio',
                            'competencias_descripcion',
                            ];
    protected $guarded = ['id'];
    public $timestamps = true;

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class, 'curriculum_id');
    }

}
