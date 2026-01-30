<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Throwable;


abstract class BaseService
{
   
    protected BaseRepository $repository;

 
    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list(array $filters = [], array $with = [], ?int $limit = null): Collection
    {
        return $this->repository->list($filters, $with, $limit);
    }

    
    public function get(int|string $id, array $with = []): ?Model
    {
        return $this->repository->get($id, $with);
    }

 
    public function create(array $data): Model
    {
        return DB::transaction(function () use ($data) {
            return $this->repository->create($data);
        });
    }

   
    public function update(int|string $id, array $data): ?Model
    {
        return DB::transaction(function () use ($id, $data) {
            return $this->repository->update($id, $data);
        });
    }

    public function delete(int|string $id): bool
    {
        return DB::transaction(function () use ($id) {
            return $this->repository->delete($id);
        });
    }
}
