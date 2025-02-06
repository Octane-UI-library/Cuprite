<?php

namespace App\Services;

use App\Models\Icon;
use App\Traits\ServiceTrait;
use Illuminate\Database\Eloquent\Collection;

class IconService
{
    use ServiceTrait;

    public function getAllIcons(): Collection
    {
        return $this->getAll(Icon::class);
    }

    public function getIcon(int|string $data, string $column = 'class'): mixed
    {
        return $this->get($data, Icon::class, $column);
    }

    public function createIcon(array $data)
    {
        return $this->create($data, Icon::class);
    }

    public function updateIcon(int $id, object $data)
    {
        return $this->update($id, $data, Icon::class);
    }

    public function deleteIcon(int $id): true
    {
        return $this->delete($id, Icon::class);
    }
}
