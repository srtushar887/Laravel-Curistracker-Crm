<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class claim_manager extends Model
{
    use HasFactory;

    protected $fillable =['file_name','npl','check_date','patient_id',
        'last_name_first_name','status_1','payer','payer_claim_control_number','svc_date','cpt',
        'charge_amount_2','payment_amount_2','group_name','adj_amount','translated_reason_code','idcs','invoice_date','invoice_name','issue_code','action_code'];

}
