<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Notification;
use Auth;

class NotificationController extends Controller
{
    //
    public function getIndex($id = null)
    {

        return view('admin.pages.notifications.index');
    }

    public function postIndex(Request $request , $id =null)
    {
        $v = validator($request->all() , [
            'message' => 'required' ,
            'receiver_id' => 'required'
        ],[
            'message.required' => 'Please enter your message',
            'receiver_id.required' => 'Please select at least one promoter '
        ]);

        if ($v->fails()){
            return ['status' => 'error' ,'data' => implode("<br>" , $v->errors()->all())];
        }

        $message = $request->message;

        $sender_id = Auth::guard('admins')->user()->id;
        foreach ($request->receiver_id as $receiver_id) {
            $notification = new Notification();

            $notification->message = $message;
            $notification->sender_id = $sender_id;
            $notification->receiver_id = $receiver_id;

            $notification->save();
        }


        return ['status' => 'success' ,'data' => 'Notification has been send successfully' ];
    }

    public function getAll()
    {
        $notifications = Notification::where('receiver_id' , auth()->guard('admins')->user()->id)->get();

        return view('admin.pages.notifications.all' ,compact('notifications'));
    }
}
