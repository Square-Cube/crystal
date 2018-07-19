<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Interaction;
use App\Product;
use App\Project;
use App\Questionnaire;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function getIndex()
    {
        $users = User::all();

        return view('admin.pages.users.index' ,compact('users'));
    }

    public function getAddUser()
    {
        return view('admin.pages.users.add');
    }

    public function postIndex(UserRequest $request)
    {
        $request->store();

        return ['status' => 'success' ,'data' => 'User has been added successfully' ,'url' => route('admin.users')];
    }

    public function getSingleUser(User $user)
    {
        return view('admin.pages.users.single' ,compact('user'));
    }

    public function getDelete($id)
    {
        $user = User::find($id);

        $destination = storage_path('uploads/users');
        @unlink($destination . "/{$user->image}");

        $user->delete();

        return redirect()->route('admin.users');
    }

    public function getEdit(User $user)
    {
        return view('admin.pages.users.edit' ,compact('user'));
    }

    public function postEdit(UserRequest $request , $id)
    {
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'User has been updated successfully'];
    }


    public function getUserDetails(Project $singleProject , User $user)
    {
        $interactions = Interaction::where('project_id' , $singleProject->id)->where('promoter_id' , $user->id)->get();
        $questionnaires = Questionnaire::where('project_id' , $singleProject->id)->where('promoter_id' , $user->id)->get();
        $products = Product::where('project_id' , $singleProject->id)->where('user_id' , $user->id)->get();

        return view('admin.pages.users.user_detail' ,compact('interactions' ,'questionnaires' ,'products' ,'user' ,'singleProject'));
    }
}
