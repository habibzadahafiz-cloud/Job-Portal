<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Medicines;

class ReportController extends Controller
{
    public function index()
    {
        $totalPatients = Patient::count();

        $totalDoctors = Doctor::count();

        $totalAppointments = Appointment::count();

        $totalMedicines = Medicines::count();

        $pendingAppointments = Appointment::where(
            'status',
            'Pending'
        )->count();

        $approvedAppointments = Appointment::where(
            'status',
            'Approved'
        )->count();

        return view(
            'Admin.report.index',
            compact(
                'totalPatients',
                'totalDoctors',
                'totalAppointments',
                'totalMedicines',
                'pendingAppointments',
                'approvedAppointments'
            )
        );
    }
    public function doctorReport()
{
    $doctors = Doctor::with('department')->get();

    return view(
        'Admin.report.doctors',
        compact('doctors')
    );
}
public function patientReport()
{
    $patients = Patient::all();

    return view(
        'Admin.report.patients',
        compact('patients')
    );
}
public function appointmentReport()
{
    $appointments = Appointment::with([
        'patient',
        'doctor'
    ])->get();

    return view(
        'Admin.report.appointments',
        compact('appointments')
    );
}
public function medicineReport()
{
    $medicines = Medicines::all();

    return view(
        'Admin.report.medicine',
        compact('medicines')
    );
}
}
