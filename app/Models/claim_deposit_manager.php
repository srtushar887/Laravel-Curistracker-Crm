<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class claim_deposit_manager extends Model
{
    use HasFactory;
    protected $fillable=['payer','check_date','check_date_order','deposit_check_id','amount','file_name','claims','npl','idcs'];

}
