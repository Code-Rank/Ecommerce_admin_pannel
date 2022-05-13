<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brandmodel extends Model
{
    public $table="brand";
    public $timestamps = false;
    use HasFactory;
}
