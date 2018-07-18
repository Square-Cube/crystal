<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\Http\Requests\InteractionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function getIndex()
    {
        return view('admin.pages.dashboard.index');
    }

    public function getLocation()
    {
        return view('admin.pages.dashboard.location');
    }

    public function postAddLocation(Request $request)
    {
        $attendance = new Attendance();

        $attendance->location = $request->location;
        $attendance->time = $request->time;
        $attendance->user_id = auth()->guard('admins')->user()->id;

        if ($attendance->save()){
            return ['url' => route('admin.dashboard')];
        }
    }
}
