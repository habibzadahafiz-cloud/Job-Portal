<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $appointments = Appointment::with(
        ['patient','doctor']
    )->get();

    return view(
        'Admin.appointment.index',
        compact('appointments')
    );
}

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $patients = Patient::all();

    $doctors = Doctor::all();

    return view(
        'Admin.appointment.create',
        compact(
            'patients',
            'doctors'
        )
    );
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([

        'patient_id'=>'required',

        'doctor_id'=>'required',

        'appointment_date'=>'required',

        'appointment_time'=>'required',

    ]);

    Appointment::create([

        'patient_id'=>$request->patient_id,

        'doctor_id'=>$request->doctor_id,

        'appointment_date'=>$request->appointment_date,

        'appointment_time'=>$request->appointment_time,

        'status'=>$request->status,

    ]);

    return redirect()
        ->route('appointments.index');
}

    /**
     * Display the specified resource.
     */
public function edit(
    Appointment $appointment
)
{
    $patients = Patient::all();

    $doctors = Doctor::all();

    return view(
        'Admin.appointment.edit',
        compact(
            'appointment',
            'patients',
            'doctors'
        )
    );
}

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
public function update(
    Request $request,
    Appointment $appointment
)
{
    $appointment->update([

        'patient_id'=>$request->patient_id,

        'doctor_id'=>$request->doctor_id,

        'appointment_date'=>$request->appointment_date,

        'appointment_time'=>$request->appointment_time,

        'status'=>$request->status,

    ]);

    return redirect()
        ->route('appointments.index');
}

    /**
     * Remove the specified resource from storage.
     */
public function destroy(
    Appointment $appointment
)
{
    $appointment->delete();

    return redirect()
        ->route('appointments.index');
}
public function pending()
{

    $appointments = Appointment::with([
        'patient',
        'doctor'
    ])
    ->where('status','Pending')
    ->get();


    return view(
        'Admin.appointment.pending',
        compact('appointments')
    );

}
public function approve($id)
{

    $appointment = Appointment::findOrFail($id);


    $appointment->update([

        'status'=>'Approved'

    ]);


    return back()
    ->with(
        'success',
        'Appointment Approved Successfully'
    );

}
public function cancel($id)
{

    $appointment = Appointment::findOrFail($id);


    $appointment->update([

        'status'=>'Cancelled'

    ]);


    return back()
    ->with(
        'success',
        'Appointment Cancelled'
    );

}
public function storePublic(Request $request)
{

    $request->validate([

        'doctor_id'=>'required',
        'appointment_date'=>'required',
        'appointment_time'=>'required',
        'message'=>'nullable'

    ]);


    $patient = Patient::where(
        'email',
        auth()->user()->email
    )->first();


    Appointment::create([

        'patient_id'=>$patient->id,

        'doctor_id'=>$request->doctor_id,

        'appointment_date'=>$request->appointment_date,

        'appointment_time'=>$request->appointment_time,

        'status'=>'Pending',

        'message'=>$request->message

    ]);


    return back()->with(
        'success',
        'Appointment Submitted Successfully'
    );

}
public function storee(Request $request)
{
    $patient = Patient::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'age' => $request->age,
        'gender' => $request->gender,
        'address' => $request->address,
    ]);

    Appointment::create([
        'patient_id' => $patient->id,
        'doctor_id' => $request->doctor_id,
        'appointment_date' => $request->appointment_date,
        'appointment_time' => $request->appointment_time,
        'status' => 'pending',
    ]);

    return back()->with('success', 'Appointment Created Successfully');
}
}
