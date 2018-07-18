<?php

Route::group(['namespace' => 'Admin'] ,function (){

    /**
     * home page
     */
    Route::get('/' ,['as' => 'admin.home' ,'uses' => 'HomeController@getIndex']);

    /**
     * Authentication routes
     */
    Route::group([ 'namespace' => 'Auth'], function () {
        Route::get('/login', 'AuthController@getIndex');
        Route::post('/login', 'AuthController@postLogin')->name('admin.login');
        Route::get('/logout', 'AuthController@getLogout')->name('admin.logout');
    });

    Route::group(['middleware' => 'auth.admin'] ,function (){

        /**
         * dashboard route
         */
        Route::get('/dashboard' ,['as' => 'admin.dashboard' ,'uses' => 'DashboardController@getIndex']);
        Route::get('/location' ,['as' => 'admin.location' ,'uses' => 'DashboardController@getLocation']);
        Route::post('/location' ,['as' => 'admin.location' ,'uses' => 'DashboardController@postAddLocation']);


        /**
         * interaction route
         */
        Route::get('/interaction' ,['as' => 'admin.interaction' ,'uses' => 'InteractionController@getIndex']);
        Route::post('/interaction' ,['as' => 'admin.interaction' ,'uses' => 'InteractionController@postIndex']);

        /**
         * products route
         */
        Route::get('/products' ,['as' => 'admin.products' ,'uses' => 'ProductController@getIndex']);
        Route::post('/products' ,['as' => 'admin.products' ,'uses' => 'ProductController@postIndex']);


        /**
         * images route
         */
        Route::get('/images' ,['as' => 'admin.images' ,'uses' => 'ProductController@getImage']);
        Route::post('/images' ,['as' => 'admin.images' ,'uses' => 'ProductController@postImage']);


        /**
         * questionnaire route
         */
        Route::get('/questionnaire' ,['as' => 'admin.questionnaire' ,'uses' => 'QuestionnaireController@getIndex']);
        Route::post('/questionnaire' ,['as' => 'admin.questionnaire' ,'uses' => 'QuestionnaireController@postIndex']);

        /**
         * break routes
         */
        Route::get('/break' ,['as' => 'admin.breakout' ,'uses' => 'BreakController@getIndex']);
        Route::post('/break' ,['as' => 'admin.breakout' ,'uses' => 'BreakController@postIndex']);
        Route::post('/breakout/edit' ,['as' => 'admin.breakout.edit' ,'uses' => 'BreakController@postEdit']);

        /**
         * users routes
         */
        Route::group(['prefix' => 'users'] ,function (){
            Route::get('/all-users' ,['as' => 'admin.users' ,'uses' => 'UserController@getIndex']);
            Route::get('/single-user/{user}' ,['as' => 'admin.users.single' ,'uses' => 'UserController@getSingleUser']);
            Route::get('/edit/{user}' ,['as' => 'admin.users.edit' ,'uses' => 'UserController@getEdit']);
            Route::post('/edit/{id}' ,['as' => 'admin.users.edit' ,'uses' => 'UserController@postEdit']);
            Route::get('/add-new-user' ,['as' => 'admin.users.index' ,'uses' => 'UserController@getAddUser']);
            Route::post('/add-user' ,['as' => 'admin.users.add' ,'uses' => 'UserController@postIndex']);
            Route::get('/delete/{id}' ,['as' => 'admin.users.delete' ,'uses' => 'UserController@getDelete']);
        });

        /**
         * projects routes
         */
        Route::group(['prefix' => 'projects'] ,function (){
            Route::get('/' ,['as' => 'admin.projects' ,'uses' => 'ProjectController@getIndex']);
            Route::get('/add-project' ,['as' => 'admin.projects.add' ,'uses' => 'ProjectController@getAddProject']);
            Route::post('/add-project' ,['as' => 'admin.projects.add' ,'uses' => 'ProjectController@postIndex']);
            Route::get('/{project}' ,['as' => 'admin.projects.single' ,'uses' => 'ProjectController@getSingleProject']);
            Route::get('/delete/{id}' ,['as' => 'admin.projects.delete' ,'uses' => 'ProjectController@getDelete']);
            Route::get('/edit/{project}' ,['as' => 'admin.projects.edit' ,'uses' => 'ProjectController@getEdit']);
            Route::post('/edit/{id}' ,['as' => 'admin.projects.edit' ,'uses' => 'ProjectController@postEdit']);
        });
    });
});
