<?php

namespace App\Actions\Component;

use App\Http\Requests\Components\ComponentRequest;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ComponentUpdateAction
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle(ComponentRequest $request, int $id)
    {
        $service = app()->get('componentService');

        $data = $request->all();

        return $service->updateComponent($id, (object)$data);
    }
}
