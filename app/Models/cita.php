<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cita extends Model
{
    use HasFactory;
    protected $table= 'citas';
    public $timestamps= false;
    protected $guarded=[];
}
