<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{

    public function profile()
    {
        $user = Auth::user();

        return view(
            'Admin.setting.profile',
            compact('user')
        );
    }



    public function updateProfile(Request $request)
    {

        $user = Auth::user();


        $request->validate([

            'name'=>'required',

            'email'=>'required|email'

        ]);


        $user->name = $request->name;

        $user->email = $request->email;


        if($request->password)
        {

            $user->password =
            Hash::make($request->password);

        }


        $user->save();


        return back()
        ->with(
            'success',
            'Profile Updated Successfully'
        );

    }
public function settings()
{

    $setting = Setting::first();


    return view(
        'Admin.setting.system',
        compact('setting')
    );

}



public function updateSettings(Request $request)
{

    $request->validate([

        'hospital_name'=>'required',

        'email'=>'nullable|email',

    ]);



    $setting = Setting::first();



    if(!$setting)
    {
        $setting = new Setting();
    }



    $setting->hospital_name =
    $request->hospital_name;


    $setting->email =
    $request->email;


    $setting->phone =
    $request->phone;


    $setting->address =
    $request->address;



    // Logo Upload

    if($request->hasFile('logo'))
    {


        $file = $request->file('logo');


        $filename =
        time().'.'.$file->getClientOriginalExtension();



        // create folder public/hospital

        if(!file_exists(public_path('hospital')))
        {

            mkdir(
                public_path('hospital'),
                0777,
                true
            );

        }



        $file->move(

            public_path('hospital'),

            $filename

        );



        $setting->logo =
        'hospital/'.$filename;


    }



    $setting->save();



    return back()->with(

        'success',

        'Settings Updated Successfully'

    );


}

}
