<?php

namespace App\Actions\Category;

use App\Http\Requests\Categories\CategoryRequest;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CategoryCreateAction
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle(CategoryRequest $request): void
    {
        $service = app()->get('categoryService');

        $slug = str_replace(' ', '-', strtolower($request->slug));

        $service->createCategory([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug,
            'icon_id' => $request->icon_id,
        ]);
    }
}
