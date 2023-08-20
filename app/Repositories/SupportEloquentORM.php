<?php

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Repositories\Contracts\SupportRepositoryInterface;

class SupportEloquentORM implements SupportRepositoryInterface
{
    public function getAll(string $filter = null): array
    {
        
    }

    public function findOne(string $id): stdClass|null
    {
        
    }

    public function delete(string $id): void
    {
        
    }

    public function create(CreateSupportDTO $dto): stdClass
    {
        
    }

    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        
    }

}

?>