<?php

namespace App\Providers;

use App\Project;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Authenticated;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app['events']->listen(Authenticated::class, function ($e) {

            if($e->user->type == 'promoter'){

                $project = Project::whereDate('start_date', '<' , Carbon::now())->whereDate('end_date', '>' , Carbon::now())->whereHas('users' ,function ($q) use ($e){
                    $q->where('user_id' , $e->user->id);
                })->first();

            }else{

                $project = null;
            }

            view()->share('project', $project);
        });


        \Schema::defaultStringLength(191);

//
//        dd($project);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
