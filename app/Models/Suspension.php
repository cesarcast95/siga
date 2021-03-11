<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suspension extends Model
{
    protected $table = "suspension";
    protected $fillable = ['contrato_id', 'dias_suspension', 'fecha_suspension'];
    public $timestamps = false;

    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'contrato_id');
    }
}
