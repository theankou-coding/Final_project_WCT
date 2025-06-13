<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return response()->json(Item::all());
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        return response()->json($item);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'sometimes|string',
            'description' => 'sometimes|string',
            'category' => 'sometimes|string',
            'price_per_day' => 'sometimes|numeric',
        ]);

        $item = Item::create($data);

        return response()->json([
            'message' => 'Item created successfully',
            'item' => $item
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $data = $request->validate([
            'name' => 'sometimes|string',
            'description' => 'sometimes|string',
            'category' => 'sometimes|string',
            'price_per_day' => 'sometimes|numeric',
        ]);

        $item->update($data);

        return response()->json([
            'message' => 'Item updated successfully',
            'item' => $item
        ]);
    }

    public function destroy($id)
    {
        $deleted = Item::destroy($id);

        if ($deleted) {
            return response()->json([
                'message' => 'Item deleted successfully',
                'status' => 'success'
            ], 200);
        }

        return response()->json([
            'message' => 'Item not found',
            'status' => 'error'
        ], 404);
    }
}
