<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Component\ComponentCreateAction;
use App\Actions\Component\ComponentUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Components\ComponentRequest;
use App\Models\Component;
use App\Services\CategoryService;
use App\Services\ComponentService;
use Exception;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class AdminComponentController extends Controller
{
    private ComponentService $componentService;

    private CategoryService $categoryService;

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __construct()
    {
        $this->componentService = app()->get('componentService');
        $this->categoryService = app()->get('categoryService');
    }

    public function index()
    {
        $components = Component::with('category')->get();

        return view('admin.elements.component.index', [
            'components' => $components,
        ]);
    }

    public function create()
    {
        $categories = $this->categoryService->getAllCategories();

        return view('admin.elements.component.create', [
            'categories' => $categories,
        ]);
    }

    public function store(ComponentRequest $request, ComponentCreateAction $action)
    {
        $request->validated();

        try {
            $action->handle($request);

            return redirect()->route('admin.components.index');
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
        $component = Component::with('category')->findOrFail($id);

        return view('admin.elements.component.show', [
            'component' => $component,
        ]);
    }

    public function edit(int $id)
    {
        $component = $this->componentService->getComponent($id);
        $categories = $this->categoryService->getAllCategories();

        return view('admin.elements.component.edit', [
            'component' => $component,
            'categories' => $categories,
        ]);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update(ComponentRequest $request, int $id, ComponentUpdateAction $action)
    {
        $request->validated();

        try {

            $action->handle($request, $id);

            return redirect()->route('admin.components.index');

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
        Component::destroy($id);

        return redirect()->route('admin.components.index');
    }
}
