<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return response()->json(Review::all());
    }

    public function show($id)
    {
        $review = Review::findOrFail($id);
        return response()->json($review);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'rental_id' => 'required|exists:rentals,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review = Review::create($data);

        return response()->json([
            'message' => 'Review created successfully',
            'review' => $review
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $data = $request->validate([
            'rating' => 'sometimes|integer|min:1|max:5',
            'comment' => 'sometimes|string',
        ]);

        $review->update($data);

        return response()->json([
            'message' => 'Review updated successfully',
            'review' => $review
        ]);
    }

    public function destroy($id)
    {
        $deleted = Review::destroy($id);

        if ($deleted) {
            return response()->json([
                'message' => 'Review deleted successfully',
                'status' => 'success'
            ], 200);
        }

        return response()->json([
            'message' => 'Review not found',
            'status' => 'error'
        ], 404);
    }
}
