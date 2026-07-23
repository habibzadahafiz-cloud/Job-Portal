<?php

namespace App\Http\Controllers;


use App\Models\PatientHistory;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;

use Illuminate\Http\Request;



class PatientHistoryController extends Controller
{


public function index()
{

    $histories = PatientHistory::with([
        'patient',
        'doctor',
        'appointment'
    ])->get();


    return view(
        'Admin.patient_history.index',
        compact('histories')
    );

}



public function create()
{

$patients = Patient::all();

$doctors = Doctor::all();

$appointments = Appointment::all();


return view(
'Admin.patient_history.create',
compact(
'patients',
'doctors',
'appointments'
)
);

}




public function store(Request $request)
{


$request->validate([


'patient_id'=>'required',

'doctor_id'=>'required',

'diagnosis'=>'required'


]);



PatientHistory::create([


'patient_id'=>$request->patient_id,

'doctor_id'=>$request->doctor_id,

'appointment_id'=>$request->appointment_id,

'diagnosis'=>$request->diagnosis,

'prescription'=>$request->prescription,

'notes'=>$request->notes


]);



return redirect()
->route('patient_history.index')
->with(
'success',
'Patient History Added Successfully'
);


}
public function edit(PatientHistory $patientHistory)
{

    $patients = Patient::all();

    $doctors = Doctor::all();

    $appointments = Appointment::all();


    return view(
        'Admin.patient_history.edit',
        compact(
            'patientHistory',
            'patients',
            'doctors',
            'appointments'
        )
    );

}
public function update(Request $request, PatientHistory $patientHistory)
{


$request->validate([

'patient_id'=>'required',
'doctor_id'=>'required',
'diagnosis'=>'required'

]);



$patientHistory->update([

'patient_id'=>$request->patient_id,

'doctor_id'=>$request->doctor_id,

'appointment_id'=>$request->appointment_id,

'diagnosis'=>$request->diagnosis,

'prescription'=>$request->prescription,

'notes'=>$request->notes

]);



return redirect()
->route('patient_history.index')
->with('success','Patient History Updated Successfully');


}




public function destroy(PatientHistory $patientHistory)
{


$patientHistory->delete();


return back();


}


}
