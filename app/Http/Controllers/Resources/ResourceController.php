<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::all();
        return view('resources.index', compact('resources'));
    }

    public function create()
    {
        return view('resources.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'status_id' => 'required|integer',
        ]);

        Resource::create($request->all());
        return redirect()->route('resources.index')->with('success', 'Ресурс создан!');
    }

    public function show(Resource $resource)
    {
        return view('resources.show', compact('resource'));
    }

    public function edit(Resource $resource)
    {
        return view('resources.edit', compact('resource'));
    }

    public function update(Request $request, $id)
    {
        $resource = Resource::findOrFail($id);
        $resource->update($request->all());
        return redirect()->route('resources.index')->with('success', 'Ресурс обновлен!');
    }

    public function destroy($id)
    {
        Resource::destroy($id);
        return redirect()->route('resources.index')->with('success', 'Ресурс удален!');
    }
}
