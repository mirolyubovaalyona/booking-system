<?php

namespace App\Http\Controllers;


use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::all();
        return response()->json($resources);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'status_id' => 'required|integer',
        ]);

        $resource = Resource::create($request->all());
        return response()->json($resource, 201);
    }

    public function update(Request $request, $id)
    {
        $resource = Resource::findOrFail($id);
        $resource->update($request->all());
        return response()->json($resource);
    }

    public function destroy($id)
    {
        Resource::destroy($id);
        return response()->json(['message' => 'Ресурс удален']);
    }
}
