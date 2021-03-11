<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = "areas";
    protected $fillable = ['area', 'direccion', 'gerencia', ];
    protected $guarded = ['id'];
    public $timestamps = false;

}
