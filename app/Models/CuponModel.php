<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuponModel extends Model
{
    public $table='cupons';
    public $timestamps = false;
    use HasFactory;
}
