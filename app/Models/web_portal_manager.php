<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class web_portal_manager extends Model
{
    use HasFactory;
    protected $fillable=['short_code','facility_name','ins_name','status','web_link','user_name','pass_word','security_questions_answers','idcs'];
}
