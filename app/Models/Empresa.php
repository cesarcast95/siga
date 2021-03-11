<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresa";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
    public $timestamps = false;
    
}
