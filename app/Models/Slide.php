<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        return $this->image_left_path
            ? Storage::disk('public')->url($this->image_left_path)
            : null;
    }

    public function getImageRightUrlAttribute(): ?string
    {
        return $this->image_right_path
            ? Storage::disk('public')->url($this->image_right_path)
            : null;
    }
}
