<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ar_followup_manager extends Model
{
    use HasFactory;
    protected $fillable=['short_code','status','fileid','payerid','claimid','first','last','patacctnum','fromdos','todos','totalcharge','mastervendor',
        'statelicenseid','printclaim','insuredid','receiveddate','errordescription'];
}
