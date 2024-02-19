<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoPersona extends Model
{
    use HasFactory;
    protected $table= 'tipo_personas';
    protected $fillable = [
        'tipo',
    ];
    public $timestamps= false;
}
