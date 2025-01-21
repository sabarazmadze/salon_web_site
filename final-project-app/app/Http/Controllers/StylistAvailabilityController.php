<?php

namespace App\Http\Controllers;

use App\Models\Stylist_availability;
use App\Http\Requests\StoreStylist_availabilityRequest;
use App\Http\Requests\UpdateStylist_availabilityRequest;
use App\Models\StylistAvailability;
use http\Env\Request;

class StylistAvailabilityController extends Controller
{
    public function index()
    {
        return StylistAvailability::with('stylist')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'stylist_id' => 'required|exists:stylists,stylist_id',
            'available_date' => 'required|date',
            'available_start_time' => 'required',
            'available_end_time' => 'required',
        ]);

        return StylistAvailability::create($validated);
    }

    public function show($id)
    {
        return StylistAvailability::with('stylist')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $availability = StylistAvailability::findOrFail($id);
        $validated = $request->validate([
            'stylist_id' => 'sometimes|required|exists:stylists,stylist_id',
            'available_date' => 'sometimes|required|date',
            'available_start_time' => 'sometimes|required',
            'available_end_time' => 'sometimes|required',
        ]);

        $availability->update($validated);
        return $availability;
    }

    public function destroy($id)
    {
        $availability = StylistAvailability::findOrFail($id);
        $availability->delete();
        return response()->json(['message' => 'Stylist availability deleted successfully']);
    }
}

