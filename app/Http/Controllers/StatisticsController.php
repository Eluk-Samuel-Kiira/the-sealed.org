<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use DB;
use File;


class StatisticsController extends Controller
{
    public function user_details()
    {
        $visitor_ip = DB::table('sessions')->get('ip_address');
        $currentUserInfo = Location::get($visitor_ip);
        return view('admin.sessions', compact('currentUserInfo'));
    }

    //post about us
    public function show_about()
    {
        $aboutus = DB::table('aboutus')->where('id', 1)->get();
        return view('about_us.postabout', compact('aboutus'));
    }
    
    public function edit_about(Request $request)
    {
        $editabout = DB::table('aboutus')->where('id', $request->id)->first();
        return view('about_us.edit', compact('editabout'));
    }

    public function update_about(Request $request)
    {
        //first delete the previous image
        $fileloc = 'app/public/About_Images/'.$request->image;
        $filename = storage_path($fileloc);

        if(File::exists($filename)) {
            File::delete($filename);
        }

        //replace with the incoming one
        $image = $request->file('image');
        if($image != null) {
            $imageName = time().'.'.$image->extension();
            $image->move(storage_path('app/public/About_Images'),$imageName);
        }
        $date = now()->format('Y-m-d:H:i:s');
        DB::table('aboutus')->where('id', 1)->update(['photo' => $imageName, 'description' => $request->description,
        'date' => $date]);
        return redirect()->route('show.about')->with('status', 'About Us Has Been Updated Successfully');
        
    }

    //user view
    public function view_aboutus()
    {
        $about = DB::table('aboutus')->where('id', 1)->get();
        $members = DB::table('users')->get();
        return view('about_us.viewus', compact('about','members'));
    }

    public function system_users()
    {
        $user = DB::table('users')->get();
        return view('profile.users', compact('user'));
    }

    public function edit_users(Request $request)
    {
        $edituser = DB::table('users')->where('id', $request->id)->first();
        return view('profile.edit', compact('edituser'));
    }

    public function update_user(Request $request)
    {
        //first delete the previous image
        $fileloc = 'app/public/Profile_Images/'.$request->image;
        $filename = storage_path($fileloc);

        if(File::exists($filename)) {
            File::delete($filename);
        }

        //replace with the incoming one
        $image = $request->file('image');
        if($image != null) {
            $imageName = time().'.'.$image->extension();
            $image->move(storage_path('app/public/Profile_Images'),$imageName);
        }

        $date = now()->format('Y-m-d:H:i:s');
        DB::table('users')->where('id', $request->id)->update(['photo' => $imageName, 'role' => $request->role_id,
        'updated_at' => $date]);
        return redirect()->route('show.users')->with('status', 'User Has Been Updated Successfully');

    } 
}
