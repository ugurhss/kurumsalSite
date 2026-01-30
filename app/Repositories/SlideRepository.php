<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;   
use App\Models\Slide;

class SlideRepository extends BaseRepository
{
    public function __construct(Slide $model)
    {
        parent::__construct($model);
    }
}