<?php

namespace App\Actions\Icon;

use App\Http\Requests\Icons\IconRequest;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class IconUpdateAction
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle(IconRequest $request, int $id)
    {
        $service = app()->get('iconService');

        $data = $request->all();

        return $service->updateIcon($id, (object) $data);
    }
}
