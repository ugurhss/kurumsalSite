<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

  
    public function getLogoUrlAttribute(): ?string
    {
        if (empty($this->logo_path) || !is_string($this->logo_path)) {
            return null;
        }

        if (Str::startsWith($this->logo_path, ['http://', 'https://'])) {
            return $this->logo_path;
        }

        $normalized = ltrim($this->logo_path, '/');

        if (Str::startsWith($normalized, 'assets/')) {
            return asset($normalized);
        }

        return Storage::disk('public')->url($normalized);
    }
}
