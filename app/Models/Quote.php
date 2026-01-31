<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table = 'quotes';

    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'company',
        'city',
        'product',
        'details',
        'status',
    ];
}
