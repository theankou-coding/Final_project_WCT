<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return response()->json(Admin::all());
    }

    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return response()->json($admin);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|unique:admins,username',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6',
            'role' => 'sometimes|string'
        ]);

        $data['password'] = bcrypt($data['password']);

        $admin = Admin::create($data);

        return response()->json([
            'message' => 'Admin created successfully',
            'admin' => $admin
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $data = $request->validate([
            'username' => 'sometimes|string|unique:admins,username,' . $id,
            'email' => 'sometimes|email|unique:admins,email,' . $id,
            'password' => 'sometimes|string|min:6',
            'role' => 'sometimes|string'
        ]);

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $admin->update($data);

        return response()->json([
            'message' => 'Admin updated successfully',
            'admin' => $admin
        ]);
    }

    public function destroy($id)
    {
        $deleted = Admin::destroy($id);

        if ($deleted) {
            return response()->json([
                'message' => 'Admin deleted successfully',
                'status' => 'success'
            ], 200);
        }

        return response()->json([
            'message' => 'Admin not found',
            'status' => 'error'
        ], 404);
    }
}
