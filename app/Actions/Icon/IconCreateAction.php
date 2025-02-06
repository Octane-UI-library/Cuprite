<?php

namespace App\Actions\Icon;

use App\Http\Requests\Icons\IconRequest;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class IconCreateAction
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle(IconRequest $request): void
    {
        $service = app()->get('iconService');

        $service->createIcon([
            'name' => $request->name,
            'class' => $request->class,
        ]);
    }
}
