<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Http\Requests\StoreBookingsRequest;
use App\Http\Requests\UpdateBookingsRequest;

class BookingController extends Controller
{
    public function index()
    {
        return Booking::with(['client', 'bookable'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bookable_id' => 'required|integer',
            'bookable_type' => 'required|string',
            'client_id' => 'required|exists:clients,client_id',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'notes' => 'nullable|string',
        ]);

        return Booking::create($validated);
    }

    public function show($id)
    {
        return Booking::with(['client', 'bookable'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $validated = $request->validate([
            'bookable_id' => 'sometimes|required|integer',
            'bookable_type' => 'sometimes|required|string',
            'client_id' => 'sometimes|required|exists:clients,client_id',
            'booking_date' => 'sometimes|required|date',
            'booking_time' => 'sometimes|required',
            'notes' => 'nullable|string',
        ]);

        $booking->update($validated);
        return $booking;
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return response()->json(['message' => 'Booking deleted successfully']);
    }
}
