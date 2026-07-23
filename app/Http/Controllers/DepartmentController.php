<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $departments = Department::all();

    return view(
        'Admin.department.index',
        compact('departments')
    );
}
    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    return view('Admin.department.create');
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    Department::create([
        'name' => $request->name,
        'description' => $request->description,
    ]);
    $request->validate([

'name'=>'required|string|max:255|unique:departments,name',

]);

    return redirect()
            ->route('departments.index')
            ->with('success','Department Added');
}

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit(Department $department)
{
    return view('Admin.department.edit', compact('department'));
}

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Department $department)
{
    $department->update([
        'name' => $request->name,
        'description' => $request->description,
    ]);
    $request->validate([

'name'=>'required|string|max:255|unique:departments,name,'.$department->id,

]);

    return redirect()->route('departments.index')
                     ->with('success', 'Department Updated');
}

public function destroy(Department $department)
{
    $department->delete();

    return redirect()->route('departments.index')
                     ->with('success', 'Department Deleted');
}

    /**
     * Remove the specified resource from storage.
     */

}
