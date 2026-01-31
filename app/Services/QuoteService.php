<?php

namespace App\Services;

use App\Repositories\QuoteRepository;

class QuoteService extends BaseService
{
    public function __construct(QuoteRepository $repository)
    {
        parent::__construct($repository);
    }

    // İstersen burada domain-logic ekleyebilirsin:
    // public function markAsContacted(int $id) { ... }
}
