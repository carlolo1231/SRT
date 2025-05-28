<?php

namespace App\Http\Controllers;

use App\Models\DeliverySupply;
use Illuminate\Http\Request;

class DeliverySupplyController extends Controller
{
    // List all delivery supplies
    public function index()
    {
        $supplies = DeliverySupply::all();
        return response()->json($supplies);
    }

    // Store a new delivery supply
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'delivered_by' => 'required|string|max:255',
            'delivery_date' => 'required|date',
        ]);

        $supply = DeliverySupply::create($validated);

        return response()->json(['message' => 'Delivery recorded successfully.', 'data' => $supply], 201);
    }

    // Update an existing delivery supply
    public function update(Request $request, $id)
    {
        $supply = DeliverySupply::findOrFail($id);

        $validated = $request->validate([
            'item_name' => 'sometimes|string|max:255',
            'quantity' => 'sometimes|integer|min:1',
            'delivered_by' => 'sometimes|string|max:255',
            'delivery_date' => 'sometimes|date',
        ]);

        $supply->update($validated);

        return response()->json(['message' => 'Delivery updated successfully.', 'data' => $supply]);
    }

    // Delete a delivery supply
    public function destroy($id)
    {
        $supply = DeliverySupply::findOrFail($id);
        $supply->delete();

        return response()->json(['message' => 'Delivery deleted successfully.']);
    }
}
