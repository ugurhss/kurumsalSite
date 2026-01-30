<?php

namespace App\Services;

use App\Repositories\Product3DRepository;

class Product3DService extends BaseService
{
    public function __construct(Product3DRepository $repository)
    {
        parent::__construct($repository);
    }
}
