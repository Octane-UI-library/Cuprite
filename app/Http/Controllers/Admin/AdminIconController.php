<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Icon\IconCreateAction;
use App\Actions\Icon\IconUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Icons\ComponentRequest;
use App\Http\Requests\Icons\IconRequest;
use App\Services\IconService;
use Exception;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class AdminIconController extends Controller
{
    private IconService $service;

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __construct()
    {
        $this->service = app()->get('iconService');
    }

    public function index()
    {
        $icons = $this->service->getAllIcons();

        return view('admin.elements.icons.index', [
            'icons' => $icons,
        ]);
    }

    public function create()
    {
        return view('admin.elements.icons.create');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws Exception
     */
    public function store(IconRequest $request, IconCreateAction $action)
    {
        $request->validated();

        try {
            $action->handle($request);

            return redirect()->route('admin.icons.index');
        } catch (Exception $e) {
            if (config('app.debug')) {
                throw new Exception($e->getMessage(), $e->getCode());
            } else {
                abort(500, 'Something went wrong');
            }
        }
    }

    public function show(int $id)
    {
        $icon = $this->service->getIcon($id);

        return view('admin.elements.icons.show', [
            'icon' => $icon,
        ]);
    }

    public function edit(int $id)
    {
        $icon = $this->service->getIcon($id);

        return view('admin.elements.icons.edit', [
            'icon' => $icon,
        ]);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update(IconRequest $request, int $id, IconUpdateAction $action)
    {
        $request->validated();

        try {

            $action->handle($request, $id);

            return redirect()->route('admin.icons.index');

        } catch (Exception $e) {
            if (config('app.debug')) {
                throw new Exception($e->getMessage(), $e->getCode());
            } else {
                abort(500, 'Something went wrong');
            }
        }
    }

    public function destroy(int $id)
    {
        $this->service->deleteIcon($id);

        return redirect()->route('admin.icons.index');
    }
}
