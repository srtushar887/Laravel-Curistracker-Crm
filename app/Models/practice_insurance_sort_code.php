<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class practice_insurance_sort_code extends Model
{
    use HasFactory;
    protected $fillable = ['practice_id','insurance_sort_code'];
}
