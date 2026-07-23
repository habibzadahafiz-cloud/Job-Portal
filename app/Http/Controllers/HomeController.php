<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
  use App\Models\News;

// use Illuminate\Http\Request;

class Homecontroller extends Controller
{
public function index()
{
    $doctors = Doctor::with('department')
        ->latest()
        ->take(6)
        ->get();

    $departments = Department::latest()
        ->take(6)
        ->get();

    $appointments = Appointment::latest()
        ->take(5)
        ->get();

  $news = News::latest()->get();

    return view('index', compact(
        'doctors',
        'departments',
        'appointments',
        'news'
    ));
}
public function newsDetails($id)
{
    $news = News::findOrFail($id);

    return view('news.details', compact('news'));
}
}
