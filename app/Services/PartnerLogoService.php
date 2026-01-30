<?php

namespace App\Services;

use App\Repositories\PartnerLogoRepository;

class PartnerLogoService extends BaseService
{
    public function __construct(PartnerLogoRepository $repository)
    {
        parent::__construct($repository);
    }
}
