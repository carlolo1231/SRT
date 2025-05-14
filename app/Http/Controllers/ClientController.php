<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    /**
     * GET /clients - Get all clients
     */
    public function index(): JsonResponse
    {
        $clients = Client::all();
        return response()->json($clients);
    }

    /**
     * POST /clients - Create a new client
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'age'    => 'required|integer|min:0',
            'gender' => 'required|in:male,female,other',
        ]);

        $client = Client::create($validated);

        return response()->json([
            'message' => 'Client created successfully.',
            'client'  => $client,
        ], 201);
    }

    /**
     * GET /clients/{id} - Get a single client by ID
     */
    public function show($id): JsonResponse
    {
        $client = Client::findOrFail($id);
        return response()->json($client);
    }

    /**
     * PUT /clients/{id} - Update a client by ID
     */
    public function update(Request $request, $id): JsonResponse
    {
        $client = Client::findOrFail($id);

        $validated = $request->validate([
            'name'   => 'sometimes|required|string|max:255',
            'age'    => 'sometimes|required|integer|min:0',
            'gender' => 'sometimes|required|in:male,female,other',
        ]);

        $client->update($validated);

        return response()->json([
            'message' => 'Client updated successfully.',
            'client'  => $client,
        ]);
    }

    /**
     * DELETE /clients/{id} - Delete a client by ID
     */
    public function destroy($id): JsonResponse
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return response()->json([
            'message' => 'Client deleted successfully.',
        ]);
    }
}
