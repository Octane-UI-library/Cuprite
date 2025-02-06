<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Example;
use Illuminate\Http\Request;

class AdminExampleController extends Controller
{
    public function index()
    {
        $examples = Example::all();

        return view('admin.elements.examples.examples', [
            'examples' => $examples,
        ]);
    }

    public function create()
    {
        return view('admin.elements.examples.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'slug' => 'required|string',
        ]);

        Example::create($request->all());

        return redirect()->back();
    }

    public function show(string $id)
    {
        $example = Example::findOrFail($id);

        return view('admin.elements.examples.show', [
            'example' => $example,
        ]);
    }

    public function edit(string $id)
    {
        $example = Example::findOrFail($id);

        return view('admin.elements.examples.edit', [
            'example' => $example,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'slug' => 'required|string',
        ]);

        $example = Example::findOrFail($id);
        $example->update($request->all());

        return redirect()->back();
    }

    public function destroy(string $id)
    {
        Example::destroy($id);

        return redirect()->back();
    }

    //    /**
    //     * Publish the specified resource.
    //     */
    //    public function publish(string $id)
    //    {
    //        //
    //    }
    //
    //    /**
    //     * Archive the specified resource.
    //     */
    //    public function archive(string $id)
    //    {
    //        //
    //    }
}
