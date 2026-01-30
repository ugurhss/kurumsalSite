<?php

namespace App\Repositories;

use App\Models\PartnerLogo;

class PartnerLogoRepository extends BaseRepository
{
    public function __construct(PartnerLogo $model)
    {
        parent::__construct($model);
    }
}
