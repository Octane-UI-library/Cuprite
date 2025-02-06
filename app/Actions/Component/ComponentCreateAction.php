<?php

namespace App\Actions\Component;

use App\Http\Requests\Components\ComponentRequest;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ComponentCreateAction
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle(ComponentRequest $request): void
    {
        $service = app()->get('componentService');

        $service->createComponent([
            'name' => $request->name,
            'description' => $request->description,
            'code_html' => $request->code_html,
            'code_vue' => $request->code_vue,
            'code_react' => $request->code_react,
            'category_id' => $request->category_id,
        ]);
    }
}
