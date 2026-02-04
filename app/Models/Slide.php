<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Slide extends Model
{
    protected $fillable = [
        'title',
        'image_left_path',
        'image_right_path',
        'left_order',
        'right_order',
        'is_active',
    ];

    protected $casts = [
        'is_active'   => 'boolean',
        'left_order'  => 'integer',
        'right_order' => 'integer',
    ];

    public function getImageLeftUrlAttribute(): ?string
    {
        return $this->publicUrlForPath($this->image_left_path);
    }

    public function getImageRightUrlAttribute(): ?string
    {
        return $this->publicUrlForPath($this->image_right_path);
    }

    private function publicUrlForPath(?string $path): ?string
    {
        if (empty($path) || !is_string($path)) {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        $normalized = ltrim($path, '/');

        if (Str::startsWith($normalized, 'assets/')) {
            return asset($normalized);
        }

        return Storage::disk('public')->url($normalized);
    }
}
