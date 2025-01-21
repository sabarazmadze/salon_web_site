<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Http\Requests\StoreClientsRequest;
use App\Http\Requests\UpdateClientsRequest;

class ClientController extends Controller
{
    public function index()
    {
        return Client::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'phone_number' => 'nullable|string|max:15',
            'email' => 'required|email|unique:clients,email',
        ]);

        return Client::create($validated);
    }

    public function show($id)
    {
        return Client::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $validated = $request->validate([
            'first_name' => 'sometimes|required|string|max:50',
            'last_name' => 'sometimes|required|string|max:50',
            'phone_number' => 'nullable|string|max:15',
            'email' => 'sometimes|required|email|unique:clients,email,' . $id . ',client_id',
        ]);

        $client->update($validated);
        return $client;
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return response()->json(['message' => 'Client deleted successfully']);
    }
}