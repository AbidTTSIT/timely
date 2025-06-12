<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSurvey extends Model
{
    protected $fillable = [
        'user_id',
        'profession',
        'income',
        'payment_mode',
        'age',
        'plan',
    ];
}
