<?php

namespace App\Actions\Category;

use App\Http\Requests\Categories\CategoryRequest;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CategoryUpdateAction
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle(CategoryRequest $request, int $id)
    {
        $service = app()->get('categoryService');

        $data = $request->all();

        return $service->updateCategory($id, (object) $data);
    }
}
