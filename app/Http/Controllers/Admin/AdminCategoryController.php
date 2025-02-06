<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Category\CategoryCreateAction;
use App\Actions\Category\CategoryUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use App\Services\IconService;
use Exception;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class AdminCategoryController extends Controller
{
    private CategoryService $categoryService;

    private IconService $iconService;

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __construct()
    {
        $this->categoryService = app()->get('categoryService');
        $this->iconService = app()->get('iconService');
    }

    public function index()
    {
        $categories = Category::with('icon')->get();

        return view('admin.elements.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        $icons = $this->iconService->getAllIcons();

        return view('admin.elements.categories.create', [
            'icons' => $icons,
        ]);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws Exception
     */
    public function store(CategoryRequest $request, CategoryCreateAction $action)
    {
        $request->validated();

        try {
            $action->handle($request);

            return redirect()->route('admin.categories.index');
        } catch (Exception $e) {
            if (config('app.debug')) {
                throw new Exception($e->getMessage(), $e->getCode());
            } else {
                abort(500, 'Something went wrong');
            }
        }
    }

    public function show(string $id)
    {
        $category = Category::with('icon')->findOrFail($id);

        return view('admin.elements.categories.show', [
            'category' => $category,
        ]);
    }

    public function edit(string $id)
    {
        $category = $this->categoryService->getCategory($id);

        $icons = $this->iconService->getAllIcons();

        return view('admin.elements.categories.edit', [
            'category' => $category,
            'icons' => $icons,
        ]);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws Exception
     */
    public function update(CategoryRequest $request, string $id, CategoryUpdateAction $action)
    {
        $request->validated();

        try {
            $action->handle($request, $id);

            return redirect()->route('admin.categories.index');
        } catch (Exception $e) {
            if (config('app.debug')) {
                throw new Exception($e->getMessage(), $e->getCode());
            } else {
                abort(500, 'Something went wrong');
            }
        }
    }

    public function destroy(string $id)
    {
        $this->categoryService->deleteCategory($id);

        return redirect()->route('admin.categories.index');
    }
}
