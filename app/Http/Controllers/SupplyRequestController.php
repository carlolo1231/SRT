<?php

namespace App\Http\Controllers;

use App\Models\SupplyRequest;
use Illuminate\Http\Request;

class SupplyRequestController extends Controller
{
    // List all supply requests
    public function index()
    {
        return response()->json(SupplyRequest::all());
    }

    // Store a new supply request
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'requested_by' => 'required|string|max:255',
            'request_date' => 'required|date',
        ]);

        $supplyRequest = SupplyRequest::create($validated);

        return response()->json(['message' => 'Request submitted successfully.', 'data' => $supplyRequest], 201);
    }

    // Show a specific request
    public function show($id)
    {
        $supplyRequest = SupplyRequest::findOrFail($id);
        return response()->json($supplyRequest);
    }

    // Update a request (e.g., approve/deny)
    public function update(Request $request, $id)
    {
        $supplyRequest = SupplyRequest::findOrFail($id);

        $validated = $request->validate([
            'item_name' => 'sometimes|string|max:255',
            'quantity' => 'sometimes|integer|min:1',
            'requested_by' => 'sometimes|string|max:255',
            'request_date' => 'sometimes|date',
            'status' => 'sometimes|string|in:pending,approved,denied',
        ]);

        $supplyRequest->update($validated);

        return response()->json(['message' => 'Request updated successfully.', 'data' => $supplyRequest]);
    }

    // Delete a request
    public function destroy($id)
    {
        $supplyRequest = SupplyRequest::findOrFail($id);
        $supplyRequest->delete();

        return response()->json(['message' => 'Request deleted successfully.']);
    }
}
