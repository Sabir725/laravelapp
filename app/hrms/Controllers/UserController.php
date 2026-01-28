<?php

namespace App\hrms\Controllers;

use App\Http\Controllers\Controller;
use App\hrms\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_code' => 'required|unique:users',
            'first_name' => 'required',
            'last_name' => 'nullable',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|unique:users',
            'password_hash' => 'nullable',
            'role' => 'nullable',
            'account_status' => 'nullable',
            'employment_status' => 'nullable',
            'department_id' => 'nullable|integer',
            'designation_id' => 'nullable|integer',
            'reporting_manager_id' => 'nullable|integer',
            'employment_type' => 'nullable',
            'date_of_joining' => 'nullable|date',
            'date_of_exit' => 'nullable|date',
            'work_location' => 'nullable',
            'work_mode' => 'nullable',
            'profile_status' => 'nullable',
            'photo' => 'nullable',
            'salary' => 'nullable|numeric',
        ]);

        $user = User::create($validatedData);

        return response()->json($user, 201);
    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'employee_code' => 'required|unique:users,employee_code,' . $user->id,
            'first_name' => 'required',
            'last_name' => 'nullable',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'mobile' => 'required|unique:users,mobile,' . $user->id,
            'password_hash' => 'nullable',
            'role' => 'nullable',
            'account_status' => 'nullable',
            'employment_status' => 'nullable',
            'department_id' => 'nullable|integer',
            'designation_id' => 'nullable|integer',
            'reporting_manager_id' => 'nullable|integer',
            'employment_type' => 'nullable',
            'date_of_joining' => 'nullable|date',
            'date_of_exit' => 'nullable|date',
            'work_location' => 'nullable',
            'work_mode' => 'nullable',
            'profile_status' => 'nullable',
            'photo' => 'nullable',
            'salary' => 'nullable|numeric',
        ]);

        $user->update($validatedData);

        return response()->json($user, 200);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
