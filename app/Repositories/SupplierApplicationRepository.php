<?php

namespace App\Repositories;

use App\Models\SupplierApplication;

class SupplierApplicationRepository extends BaseRepository
{
    public function __construct(SupplierApplication $model)
    {
        parent::__construct($model);
    }
}
