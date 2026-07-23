<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{

    $patients = Patient::all();


    $patientChart = Patient::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('count(*) as total')
        )
        ->groupBy('date')
        ->orderBy('date')
        ->get();



    return view('Admin.patient.index',
    compact(
        'patients',
        'patientChart'
    ));

}

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    return view('Admin.patient.create');
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:patients,email',
        'phone'=>'required',
        'age'=>'required',
        'gender'=>'required',
    ]);

    Patient::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'age'=>$request->age,
        'gender'=>$request->gender,
        'address'=>$request->address,
    ]);

    return redirect()->route('patients.index');
}

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit(Patient $patient)
{
    return view(
        'Admin.patient.edit',
        compact('patient')
    );
}

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Patient $patient)
{
    $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:patients,email,'.$patient->id,
        'phone'=>'required',
        'age'=>'required',
        'gender'=>'required',
    ]);

    $patient->update([
        'name'=>$request->name,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'age'=>$request->age,
        'gender'=>$request->gender,
        'address'=>$request->address,
    ]);

    return redirect()->route('patients.index');
}

    /**
     * Remove the specified resource from storage.
     */
public function destroy(Patient $patient)
{
    $patient->delete();

    return redirect()->route('patients.index');
}
}
