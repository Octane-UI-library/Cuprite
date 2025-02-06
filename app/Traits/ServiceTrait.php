<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;

trait ServiceTrait
{
    public function getAll($model): Collection
    {
        return $model::query()->get();
    }

    public function get(int|string $data, $model, string $column): mixed
    {
        if (is_numeric($data)) {
            return $model::query()->where('id', $data)->firstOrFail();
        }

        if (is_string($data)) {
            return $model::query()->where($column, $data)->get();
        }

        return false;
    }

    public function create(array $data, $model)
    {
        $fillableCount = count((new $model)->getFillable());

        $dataCount = count($data);

        if ($fillableCount !== $dataCount) {
            throw ValidationException::withMessages([
                'data' => 'The number of fields in the data array does not match the number of fillable fields in the model.',
            ]);
        }

        return $model::query()->create($data);
    }

    public function update(int $id, object $data, $model)
    {
        $item = $model::query()->findOrFail($id);

        $dataArray = (array) $data;

        $item->update($dataArray);

        return $item;
    }

    public function delete(int $id, $model): true
    {
        $item = $model::query()->findOrFail($id);

        $item->delete();

        return true;
    }
}
