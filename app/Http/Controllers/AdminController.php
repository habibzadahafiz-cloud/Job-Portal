<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Medicines;
use App\Models\Patient;

class AdminController extends Controller
{
    public function dashboard()
    {
        $doctors = Doctor::count();
        $patients = Patient::count();
        $appointments = Appointment::count();
        $departments = Department::count();
        $medicines = Medicines::count();

        return view('Admin.dashboard', compact(
            'doctors',
            'patients',
            'appointments',
            'departments',
            'medicines'
        ));
        return redirect()->route('admin.dashboard');
    }
}
