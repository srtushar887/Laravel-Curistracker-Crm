<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class practice_npl_number extends Model
{
    use HasFactory;
    protected $fillable = ['practice_id','npl_number'];
}
