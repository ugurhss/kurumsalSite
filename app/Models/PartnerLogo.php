<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerLogo extends Model
{
    protected $table = 'partner_logos';

    protected $fillable = [
        'name',
        'logo_path',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

  
    public function getLogoUrlAttribute(): string
    {
        return asset('storage/' . $this->logo_path);
    }
}
