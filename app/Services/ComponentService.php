<?php

namespace App\Services;

use App\Models\Component;
use App\Traits\ServiceTrait;
use Illuminate\Database\Eloquent\Collection;

class ComponentService
{
    use ServiceTrait;

    public function getAllComponents(): Collection
    {
        return $this->getAll(Component::class);
    }

    public function getComponent(int|string $data, string $column = 'class'): mixed
    {
        return $this->get($data, Component::class, $column);
    }

    public function createComponent(array $data)
    {
        return $this->create($data, Component::class);
    }

    public function updateComponent(int $id, object $data)
    {
        return $this->update($id, $data, Component::class);
    }

    public function deleteComponent(int $id): true
    {
        return $this->delete($id, Component::class);
    }
}
