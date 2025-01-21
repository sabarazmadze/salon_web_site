<?php

namespace App\Http\Controllers;

use App\Models\Stylists;
use App\Http\Requests\StoreStylistsRequest;
use App\Http\Requests\UpdateStylistsRequest;

class StylistController extends Controller
{
    public function index()
    {
        return Stylist::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'phone_number' => 'nullable|string|max:15',
            'email' => 'required|email|unique:stylists,email',
            'experience_years' => 'nullable|integer|min:0',
            'specialty' => 'nullable|string|max:100',
        ]);

        return Stylist::create($validated);
    }

    public function show($id)
    {
        return Stylist::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $stylist = Stylist::findOrFail($id);
        $validated = $request->validate([
            'first_name' => 'sometimes|required|string|max:50',
            'last_name' => 'sometimes|required|string|max:50',
            'phone_number' => 'nullable|string|max:15',
            'email' => 'sometimes|required|email|unique:stylists,email,' . $id . ',stylist_id',
            'experience_years' => 'nullable|integer|min:0',
            'specialty' => 'nullable|string|max:100',
        ]);

        $stylist->update($validated);
        return $stylist;
    }

    public function destroy($id)
    {
        $stylist = Stylist::findOrFail($id);
        $stylist->delete();
        return response()->json(['message' => 'Stylist deleted successfully']);
    }
}
