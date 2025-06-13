<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        return response()->json(Rental::all());
    }

    public function show($id)
    {
        $rental = Rental::findOrFail($id);
        return response()->json($rental);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'item_id' => 'required|exists:items,id',
            'customer_id' => 'required|exists:customers,id',
            'rental_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:rental_date',
        ]);

        $rental = Rental::create($data);

        return response()->json([
            'message' => 'Rental created successfully',
            'rental' => $rental
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);

        $data = $request->validate([
            'item_id' => 'sometimes|exists:items,id',
            'customer_id' => 'sometimes|exists:customers,id',
            'rental_date' => 'sometimes|date',
            'return_date' => 'sometimes|date|after_or_equal:rental_date',
        ]);

        $rental->update($data);

        return response()->json([
            'message' => 'Rental updated successfully',
            'rental' => $rental
        ]);
    }

    public function destroy($id)
    {
        $deleted = Rental::destroy($id);

        if ($deleted) {
            return response()->json([
                'message' => 'Rental deleted successfully',
                'status' => 'success'
            ], 200);
        }

        return response()->json([
            'message' => 'Rental not found',
            'status' => 'error'
        ], 404);
    }
}
