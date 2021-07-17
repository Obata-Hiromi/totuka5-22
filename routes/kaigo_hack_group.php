<?php




//
Route::name('group.')->prefix('group')->namespace('Group')->group(function(){
    //
    Route::get('create/{type}', 'GroupController@create')->name('create');
    //
    Route::prefix('{group}')->group(function(){
        //
        Route::get('show/{index?}', 'GroupController@show')->name('show');
        //
        Route::get('user/index/{index?}', 'GroupUserController@index')->name('user.index');
        Route::get('user/create/{index}', 'GroupUserController@create')->name('user.create');
        Route::post('user/{index}', 'GroupUserController@store')->name('user.store');
        Route::get('user/{user}/show/{index}', 'GroupUserController@show')->name('user.show');
        Route::delete('user/{user}/{index}', 'GroupUserController@destroy')->name('user.destroy');
        //
        Route::post('user/{index}/store_by_csv', 'GroupUserController@storeByCsv')->name('user.store_by_csv');
        Route::get('user/{user}/quit_request_join/{index}', 'GroupUserController@quitRequestJoin')->name('user.quit_request_join');

        //
        Route::get('info/{index}/edit', 'GroupInfoController@edit')->name('info.edit');
        Route::put('info/{index}', 'GroupInfoController@update')->name('info.update');

        //
        Route::get('location/edit', 'GroupLocationController@edit')->name('location.edit');
        Route::put('location', 'GroupLocationController@update')->name('location.update');

        //
        Route::namespace('Components')->group(function(){
            Route::put('announcement/send', 'AnnouncementController@send')->name('announcement.send');
            //
            Route::get('watch', 'WatchController@watch')->name('watch');
            Route::get('unwatch', 'WatchController@unwatch')->name('unwatch');

            //
            Route::post('uploadImg', 'UploadController@uploadImg')->name('uploadImg');
            Route::delete('deleteImg', 'UploadController@deleteImg')->name('deleteImg');
            //
            Route::get('like', 'LikeController@like')->name('like');
            Route::get('unlike', 'LikeController@unlike')->name('unlike');

            //
            Route::get('user/{user}/rescue', 'RescueController@rescue')->name('user.rescue');
            Route::get('user/{user}/unrescue', 'RescueController@unrescue')->name('user.unrescue');
            Route::get('user/{user}/rescued', 'RescueController@rescued')->name('user.rescued');

            //
            Route::get('permission/{index}/edit', 'PermissionController@edit')->name('permission.edit');
            Route::put('permission/{index}', 'PermissionController@update')->name('permission.update');
        });
    });
});

//
Route::resource('group', 'Group\GroupController',['except' => ['create','show']]);
//
Route::resource('group.role', 'Group\Components\RoleController');
//
Route::resource('group.info_base', 'Group\GroupInfoBaseController');