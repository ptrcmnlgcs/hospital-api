<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return response()->json(['patients' => $patients], 200);
    }

    public function show($id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }
        return response()->json(['patient' => $patient], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email',
            'phone' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string', // Add this line
            'doctor_name' => 'required|string|max:255', // Add this line
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $patient = Patient::create($request->all());

        return response()->json(['patient' => $patient], 201);
    }

    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email,' . $id,
            'phone' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string', // Add this line
            'doctor_name' => 'required|string|max:255', // Add this line
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $patient->update($request->all());

        return response()->json(['message' => 'Patient updated successfully'], 200);
    }

    public function destroy($id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }
        $patient->delete();
        return response()->json(['message' => 'Patient deleted successfully'], 200);
    }
}
