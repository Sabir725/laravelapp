<?php

namespace App\hrms\Controllers;

use App\Http\Controllers\Controller;
use App\hrms\Models\LeadCategory;
use Illuminate\Http\Request;

class LeadCategoryController extends Controller
{
    public function index()
    {
        return LeadCategory::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'categoryname' => 'required|unique:lead_categories',
        ]);

        $leadCategory = LeadCategory::create($validatedData);

        return response()->json($leadCategory, 201);
    }

    public function show(LeadCategory $leadCategory)
    {
        return $leadCategory;
    }

    public function update(Request $request, LeadCategory $leadCategory)
    {
        $validatedData = $request->validate([
            'categoryname' => 'required|unique:lead_categories,categoryname,' . $leadCategory->id,
        ]);

        $leadCategory->update($validatedData);

        return response()->json($leadCategory, 200);
    }

    public function destroy(LeadCategory $leadCategory)
    {
        $leadCategory->delete();

        return response()->json(null, 204);
    }
}
