<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProjectRequest;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    //
    public function getIndex()
    {
        $projects = Project::all();

        return view('admin.pages.projects.index' ,compact('projects'));
    }

    public function getAddProject()
    {
        $users = User::where('type' ,'promoter')->get();

        return view('admin.pages.projects.add' ,compact('users'));
    }

    public function postIndex(ProjectRequest $request)
    {
        $request->store();

        return ['status' => 'success' ,'data' => 'Project has been added successfully' ,'url' => route('admin.projects')];
    }

    public function getSingleProject(Project $singleProject)
    {
        return view('admin.pages.projects.single' ,compact('singleProject'));
    }

    public function getDelete($id)
    {
        $project = Project::find($id);

        $destination = storage_path('uploads/projects');
        @unlink($destination . "/{$project->logo}");

        $project->delete();

        return redirect()->route('admin.projects');
    }

    public function getEdit(Project $singleProject)
    {
        $users = User::where('type' ,'promoter')->get();


        return view('admin.pages.projects.edit' ,compact('singleProject' , 'users'));
    }

    public function postEdit(ProjectRequest $request , $id)
    {
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'Project has been updated successfully'];
    }

    public function getDetachUser($id , Request $request)
    {
        $project = Project::find($id);

        $project->users()->wherePivot('user_id' , $request->user_id)->detach();

        return redirect()->back();
    }
}
