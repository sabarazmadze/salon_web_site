<?php

namespace App\Http\Controllers;

use App\Models\Stylist_services;
use App\Http\Requests\StoreStylist_servicesRequest;
use App\Http\Requests\UpdateStylist_servicesRequest;

class StylistServiceController extends Controller
{
    public function index()
    {
        return StylistService::with(['stylist', 'serviceable'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'stylist_id' => 'required|exists:stylists,stylist_id',
            'serviceable_id' => 'required|integer',
            'serviceable_type' => 'required|string',
        ]);

        return StylistService::create($validated);
    }

    public function show($id)
    {
        return StylistService::with(['stylist', 'serviceable'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $stylistService = StylistService::findOrFail($id);
        $validated = $request->validate([
            'stylist_id' => 'sometimes|required|exists:stylists,stylist_id',
            'serviceable_id' => 'sometimes|required|integer',
            'serviceable_type' => 'sometimes|required|string',
        ]);

        $stylistService->update($validated);
        return $stylistService;
    }

    public function destroy($id)
    {
        $stylistService = StylistService::findOrFail($id);
        $stylistService->delete();
        return response()->json(['message' => 'Stylist service relationship deleted successfully']);
    }
}
