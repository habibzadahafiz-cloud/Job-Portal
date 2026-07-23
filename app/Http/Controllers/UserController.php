<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Medicines;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //


public function Dashboard()
{
    if(Auth::check() && Auth::user()->user_type == "user")
    {

        return view("dashboard");
    }
    elseif(Auth::user()->user_type == "admin")
    {
        $users = User::count();
        $doctors = Doctor::count();
        $patients = Patient::count();
        $appointments = Appointment::count();
        $departments = Department::count();
        $medicines = Medicines::count();
        $pendingAppointments = Appointment::where('status','pending')->count();
        $approvedAppointments = Appointment::where('status','approved')->count();
        $recentAppointments = Appointment::latest()->take(5)->get();
        $recentPatients = Patient::latest()->take(5)->get();
            $appointmentChart = Appointment::select( DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total') )->groupBy('month')->orderBy('month')->get();
            $patientChart = Patient::select(
    DB::raw('MONTH(created_at) as month'),
    DB::raw('COUNT(*) as total')
)
->groupBy('month')
->orderBy('month')
->get();
$medicineChart = Medicines::select(
    'name',
    'quantity'
)->get();

        return view("Admin.dashboard", compact(
            'users',
            'doctors',
            'patients',
            'appointments',
            'departments',
            'medicines',
            'pendingAppointments',
            'approvedAppointments',
            'recentAppointments',
            'recentPatients',
            'appointmentChart',
            'patientChart',
            'medicineChart',
        ));
    }
}
public function search(Request $request)
{
    $search = $request->search;

    $doctors = Doctor::where('name', 'like', "%{$search}%")->get();

    $patients = Patient::where('name', 'like', "%{$search}%")->get();

    $medicines = Medicines::where('name', 'like', "%{$search}%")->get();

    return view('Admin.search', compact(
        'search',
        'doctors',
        'patients',
        'medicines'
    ));
}
public function index(){
    // $doctors = Doctor::latest()->take(6)->get();

    // $departments = Department::all();

    // $appointments = Appointment::latest()->take(5)->get();

    // return view(
    //     'maindesign',
    //     compact(
    //         'doctors',
    //         'departments',
    //         'appointments'
    //     )
    // );
    return view("index");
}

};
