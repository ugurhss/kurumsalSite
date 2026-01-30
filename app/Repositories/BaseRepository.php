<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;


abstract class BaseRepository
{
   
    protected Model $model;

   
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * yeni bir query builder döndürür.
     */
    protected function query(): Builder
    {
        return $this->model->newQuery();
    }


    public function list(array $filters = [], array $with = [], ?int $limit = null): Collection
    {
        $q = $this->query()->with($with);

        foreach ($filters as $column => $value) {
            $q->where($column, $value);
        }

        if ($limit !== null) {
            $q->limit($limit);
        }

        return $q->get();
    }

 
    public function get(int|string $id, array $with = []): ?Model
    {
        return $this->query()->with($with)->find($id);
    }

   
    public function create(array $data): Model
    {
        $created = $this->query()->create($data);
        return $created;
    }

    public function update(int|string $id, array $data): ?Model
    {
        $model = $this->get($id);

        if (!$model) {
            return null;
        }

        $model->fill($data);
        $model->save();

        return $model->fresh();
    }

  
    public function delete(int|string $id): bool
    {
        $model = $this->get($id);

        if (!$model) {
            return false;
        }

        return (bool) $model->delete();
    }
}
