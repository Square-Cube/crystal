<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InteractionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InteractionController extends Controller
{
    //
    public function getIndex()
    {
        return view('admin.pages.interaction.index');
    }

    public function postIndex(InteractionRequest $request)
    {
        $request->store();

        return ['status' => 'success' ,'data' => 'Data has been added successfully' ,'url' => route('admin.dashboard')];
    }
}
