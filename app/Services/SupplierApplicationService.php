<?php

namespace App\Services;

use App\Repositories\SupplierApplicationRepository;

class SupplierApplicationService extends BaseService
{
    public function __construct(SupplierApplicationRepository $repository)
    {
        parent::__construct($repository);
    }
}
