<?php

namespace App\hrms\Controllers;

use App\Http\Controllers\Controller;
use App\hrms\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        return Lead::with('leadCategory')->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lead_category_id' => 'nullable|exists:lead_categories,id',
            'name' => 'required',
            'status' => 'nullable',
            'feedback' => 'nullable',
            'mobile_primary' => 'required',
            'mobile_secondary' => 'nullable',
            'whatsapp_number' => 'nullable',
            'email' => 'nullable|email',
            'father_name' => 'nullable',
            'date_of_birth' => 'nullable|date',
            'city' => 'nullable',
            'state' => 'nullable',
            'class10_score' => 'nullable',
            'class10_board' => 'nullable',
            'class12_score' => 'nullable',
            'class12_board' => 'nullable',
            'ug_score' => 'nullable',
            'ug_board' => 'nullable',
            'entrance_exam_scores' => 'nullable|json',
            'source' => 'nullable',
            'assigned_to' => 'nullable|json',
            'follow_up_date' => 'nullable|date',
        ]);

        $lead = Lead::create($validatedData);

        return response()->json($lead, 201);
    }

    public function show(Lead $lead)
    {
        return $lead->load('leadCategory');
    }

    public function update(Request $request, Lead $lead)
    {
        $validatedData = $request->validate([
            'lead_category_id' => 'nullable|exists:lead_categories,id',
            'name' => 'required',
            'status' => 'nullable',
            'feedback' => 'nullable',
            'mobile_primary' => 'required',
            'mobile_secondary' => 'nullable',
            'whatsapp_number' => 'nullable',
            'email' => 'nullable|email',
            'father_name' => 'nullable',
            'date_of_birth' => 'nullable|date',
            'city' => 'nullable',
            'state' => 'nullable',
            'class10_score' => 'nullable',
            'class10_board' => 'nullable',
            'class12_score' => 'nullable',
            'class12_board' => 'nullable',
            'ug_score' => 'nullable',
            'ug_board' => 'nullable',
            'entrance_exam_scores' => 'nullable|json',
            'source' => 'nullable',
            'assigned_to' => 'nullable|json',
            'follow_up_date' => 'nullable|date',
        ]);

        $lead->update($validatedData);

        return response()->json($lead, 200);
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();

        return response()->json(null, 204);
    }
}
