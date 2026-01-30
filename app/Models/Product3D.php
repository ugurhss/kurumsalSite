<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product3D extends Model
{
    protected $table = 'products_3d';

    protected $fillable = [
        'title',
        'model_path',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Frontend için model URL
     */
    public function getModelUrlAttribute(): string
    {
        return asset('storage/' . $this->model_path);
    }
}
