<?php


//
Route::name('user.')->prefix('user')->namespace('User')->group(function(){
    //
    Route::get('', 'UserController@show')->name('show');
    Route::get('edit', 'UserController@edit')->name('edit');
    Route::put('', 'UserController@update')->name('update');

    //
    Route::get('first-setting', 'UserController@settingForm')->name('setting_form');
    Route::post('first-setting', 'UserController@setting')->name('setting');

    //
    Route::get('{info_base}/info/edit', 'UserInfoController@edit')->name('info.edit');
    Route::put('{info_base}/info', 'UserInfoController@update')->name('info.update');

    //
    Route::get('group', 'UserGroupController@index')->name('group.index');
    Route::get('group/create', 'UserGroupController@create')->name('group.create');
    Route::post('group', 'UserGroupController@store')->name('group.store');
    Route::get('group/{group}/edit', 'UserGroupController@edit')->name('group.edit');
    Route::put('group/{group}', 'UserGroupController@update')->name('group.update');
    Route::delete('group/{group}', 'UserGroupController@destroy')->name('group.destroy');
    //
    Route::get('group/{group}/accept_join_request', 'UserGroupController@acceptJoinRequest')->name('group.accept_join_request');
    Route::get('group/{group}/denied_join_request', 'UserGroupController@deniedJoinRequest')->name('group.denied_join_request');

    //
    Route::get('info_base', 'UserInfoBaseController@index')->name('info_base.index');
    Route::get('info_base/create', 'UserInfoBaseController@create')->name('info_base.create');
    Route::post('info_base', 'UserInfoBaseController@store')->name('info_base.store');
    Route::get('info_base/{info_base}/edit', 'UserInfoBaseController@edit')->name('info_base.edit');
    Route::put('info_base/{info_base}', 'UserInfoBaseController@update')->name('info_base.update');
    Route::delete('info_base/{info_base}', 'UserInfoBaseController@destroy')->name('info_base.destroy');

    //
    Route::namespace('Components')->group(function(){
        Route::get('announcement/markAsReadAll', 'AnnouncementController@markAsReadAll')->name('announcement.markAsReadAll');
        //
        Route::resource('announcement', 'AnnouncementController',['only' => [
            'index','show','destroy'
        ]]);
        //
        Route::resource('setting', 'SettingController');
    });
});






