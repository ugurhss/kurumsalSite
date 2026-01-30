<?php

namespace App\Repositories;

use App\Models\Product3D;

class Product3DRepository extends BaseRepository
{
    public function __construct(Product3D $model)
    {
        parent::__construct($model);
    }
}
