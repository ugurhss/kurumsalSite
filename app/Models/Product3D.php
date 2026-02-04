<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product3D extends Model
{
    protected $table = 'products_3d';

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'model_path',
        'images',
        'specs',
        'price_note',
        'quote_url',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'images'    => 'array',
        'specs'     => 'array',
    ];

   
    public function getModelUrlAttribute(): ?string
    {
        return $this->publicUrlForPath($this->model_path);
    }

    public function getImagesUrlsAttribute(): array
    {
        if (empty($this->images) || !is_array($this->images)) {
            return [];
        }

        return collect($this->images)
            ->map(fn ($path) => $this->publicUrlForPath($path))
            ->filter()
            ->values()
            ->toArray();
    }

   
    public function setTitleAttribute(string $value): void
    {
        $this->attributes['title'] = $value;

        if (empty($this->attributes['slug'])) {
            $this->attributes['slug'] = Str::slug($value);
        }
    }

  
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
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
