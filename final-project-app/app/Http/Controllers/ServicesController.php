<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Http\Requests\StoreServicesRequest;
use App\Http\Requests\UpdateServicesRequest;

class ServiceController extends Controller
{
    public function index()
    {
        return Service::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'duration_minutes' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        return Service::create($validated);
    }

    public function show($id)
    {
        return Service::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $validated = $request->validate([
            'service_name' => 'sometimes|required|string|max:100',
            'description' => 'nullable|string',
            'duration_minutes' => 'sometimes|required|integer|min:1',
            'price' => 'sometimes|required|numeric|min:0',
        ]);

        $service->update($validated);
        return $service;
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return response()->json(['message' => 'Service deleted successfully']);
    }
}

