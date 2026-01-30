<?php

namespace App\Services;

use App\Repositories\SlideRepository;

class SlideService extends BaseService
{
    public function __construct(SlideRepository $repository)
    {
        parent::__construct($repository);
    }

  
}
