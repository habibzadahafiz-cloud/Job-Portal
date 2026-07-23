<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $doctors = Doctor::with('department')->get();
      $chartData = Department::withCount('doctors')->get();

    return view(
        'Admin.doctor.index',
        compact('doctors','chartData')
    );
}

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $departments = department::all();

    return view(
        'Admin.doctor.create',
        compact('departments')
    );
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{

    $request->validate([

        'name'=>'required|string|max:255',

        'email'=>'required|email|unique:doctors,email',

        'phone'=>'required|string|max:20',

        'department_id'=>'required|exists:departments,id',

        'Image'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',

    ]);



    $image = null;


    if($request->hasFile('Image'))
    {

        $imageName = time().'.'.$request->Image->extension();


        $request->Image->move(

            public_path('Doctor'),

            $imageName

        );


        $image = 'Doctor/'.$imageName;

    }



    Doctor::create([

        'department_id'=>$request->department_id,

        'name'=>$request->name,

        'email'=>$request->email,

        'phone'=>$request->phone,

        'specialization'=>$request->specialization,

        'Image'=>$image,

    ]);



    return redirect()
        ->route('doctors.index');

}

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit(Doctor $doctor)
{
    $departments = Department::all();

    return view(
        'Admin.doctor.edit',
        compact('doctor','departments')
    );
}

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Doctor $doctor)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:doctors,email,' . $doctor->id,
        'phone' => 'required',
        'department_id' => 'required',
        'Image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $doctor->department_id = $request->department_id;
    $doctor->name = $request->name;
    $doctor->email = $request->email;
    $doctor->phone = $request->phone;
    $doctor->specialization = $request->specialization;

    if ($request->hasFile('Image')) {

        $imageName = time().'.'.$request->Image->extension();

        $request->Image->move(
            public_path('Doctor'),
            $imageName
        );

        $doctor->Image = 'Doctor/'.$imageName;
    }

    $doctor->save();

    return redirect()->route('doctors.index');
}

    /**
     * Remove the specified resource from storage.
     */
public function destroy(Doctor $doctor)
{
    $doctor->delete();

    return redirect()->route('doctors.index');
}



}
