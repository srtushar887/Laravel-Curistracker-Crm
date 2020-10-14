<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class insurance_manager extends Model
{
    use HasFactory;
    protected $fillable =['short_code','insurance_name','insurance_no','facsimile_no','payer_id','tfl_days','appeal_limit','mailing_address',
        'custom_1','custom_2','custom_3','custom_4','custom_5','idcs'];
}
