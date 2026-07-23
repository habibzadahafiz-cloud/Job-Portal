<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
public function index()
{
    $schedules = DoctorSchedule::with('doctor')->get();

    return view('Admin.doctor_schedule.index', compact('schedules'));
}


public function create()
{
    $doctors = Doctor::all();

    return view('Admin.doctor_schedule.create', compact('doctors'));
}


public function store(Request $request)
{
    $request->validate([
        'doctor_id'=>'required',
        'day'=>'required',
        'start_time'=>'required',
        'end_time'=>'required',
    ]);

DoctorSchedule::create([
    'doctor_id' => $request->doctor_id,
    'day' => $request->day,
    'start_time' => $request->start_time,
    'end_time' => $request->end_time,
]);

    return redirect()
        ->route('schedule.index')
        ->with('success','Schedule Added Successfully');
}








    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
