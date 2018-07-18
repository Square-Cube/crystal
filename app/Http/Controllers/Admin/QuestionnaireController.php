<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QuestionnaireRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionnaireController extends Controller
{
    //

    public function getIndex()
    {
        return view('admin.pages.questionnaire.index');
    }

    public function postIndex(QuestionnaireRequest $request)
    {
        $request->store();

        return ['status' => 'success' ,'data' => 'Thanks for your feedback :)' ,'url' => route('admin.dashboard')];
    }
}