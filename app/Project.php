<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    public function users()
    {
        return $this->belongsToMany('App\User' ,'project_users')->withPivot('user_id', 'project_id');
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
