<?php

namespace App\Http\Controllers;

use App\Models\Medicines;
use Illuminate\Http\Request;

class MedicinesController extends Controller
{
    public function index()
    {
        $medicines = Medicines::all();

        return view(
            'Admin.medicine.index',
            compact('medicines')
        );
    }

    public function create()
    {
        return view(
            'Admin.medicine.create'
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required',

            'company'=>'required',

            'quantity'=>'required',

            'price'=>'required',

            'expiry_date'=>'required'

        ]);

        Medicines::create($request->all());

        return redirect()
        ->route('medicines.index');
    }

    public function edit(Medicines $medicine)
    {
        return view(
            'Admin.medicine.edit',
            compact('medicine')
        );
    }

    public function update(
        Request $request,
        Medicines $medicine
    )
    {
        $medicine->update(
            $request->all()
        );

        return redirect()
        ->route('medicines.index');
    }

    public function destroy(
        Medicines $medicine
    )
    {
        $medicine->delete();

        return redirect()
        ->route('medicines.index');
    }
    public function stock()
{
    $medicines = Medicines::all();

    return view(
        'Admin.medicine.stock',
        compact('medicines')
    );
}
public function stockInForm(Medicines $medicine)
{
    return view(
        'Admin.medicine.stock_in',
        compact('medicine')
    );
}

public function stockIn(
    Request $request,
    Medicines $medicine
)
{
    $medicine->quantity += $request->quantity;

    $medicine->save();

    return redirect()
    ->route('medicine.stock');
}
public function stockOutForm(Medicines $medicine)
{
    return view(
        'Admin.medicine.stock_out',
        compact('medicine')
    );
}

public function stockOut(
    Request $request,
    Medicines $medicine
)
{
    if(
        $request->quantity >
        $medicine->quantity
    ){
        return back()
        ->with(
            'error',
            'Insufficient Stock'
        );
    }

    $medicine->quantity -= $request->quantity;

    $medicine->save();

    return redirect()
    ->route('medicine.stock');
}
}
