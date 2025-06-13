<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return response()->json(Customer::all());
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $customer = Customer::create($data);

        return response()->json([
            'message' => 'Customer created successfully',
            'customer' => $customer
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $data = $request->validate([
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:customers,email,' . $id,
            'phone' => 'sometimes|string',
            'address' => 'sometimes|string',
        ]);

        $customer->update($data);

        return response()->json([
            'message' => 'Customer updated successfully',
            'customer' => $customer
        ]);
    }

    public function destroy($id)
    {
        $deleted = Customer::destroy($id);

        if ($deleted) {
            return response()->json([
                'message' => 'Customer deleted successfully',
                'status' => 'success'
            ], 200);
        }

        return response()->json([
            'message' => 'Customer not found',
            'status' => 'error'
        ], 404);
    }
}
