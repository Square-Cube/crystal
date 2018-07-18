<?php

namespace App\Http\Controllers\Admin;

use App\Breakout;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BreakController extends Controller
{
    public function getIndex()
    {
        return view('admin.pages.break.index');
    }

    public function postIndex(Request $request)
    {
        $break = Breakout::where('user_id' , auth()->guard('admins')->user()->id)->whereDate('created_at' ,Carbon::today())->latest()->first();

        if ($break != null){
            return ['status' => 'error' ,'data' => 'You already consumed your limit for break today'];
        }else{
            $breakout = new Breakout();

            $breakout->user_id = auth()->guard('admins')->user()->id;

            if ($breakout->save()){
                return ['status' => 'success' ,'data' => 'Start your break','url' => route('admin.breakout')];
            }

            return ['status' => 'error' ,'data' => 'Please try again later'];
        }
    }

    public function postEdit(Request $request)
    {
        $break = Breakout::where('user_id' , auth()->guard('admins')->user()->id)->latest()->first();

//        dd($break);

        $break->end_date = Carbon::now();

        if ($break->save()){
            return ['status' => 'success' ,'data' => 'End your break','url' => route('admin.dashboard')];
        }

        return ['status' => 'error' ,'data' => 'Please try again later'];
    }
}