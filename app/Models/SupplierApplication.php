<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierApplication extends Model
{
    protected $table = 'supplier_applications';

    protected $fillable = [
        'full_name',
        'company',
        'phone',
        'email',
        'city',
        'product',
        'details',
        'status',
    ];
}
