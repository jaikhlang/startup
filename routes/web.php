<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/setlang/{lang}', function ($lang) {
    Session::put('locale', $lang);

    return redirect()->back();
});

Route::get('/contact', 'ContactController@getContact');
Route::post('/contact', 'ContactController@postContact');

Auth::routes();

Route::get('auth/token', 'Auth\TwoFactorController@showTokenForm');
Route::post('auth/token', 'Auth\TwoFactorController@validateTokenForm');
Route::post('auth/two-factor', 'Auth\TwoFactorController@setupTwoFactorAuth');

Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');

Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['role:User,view-profile']], function () {
    Route::group(['prefix' => 'profile'], function () {
        Route::group(['namespace' => 'Profile'], function () {
            
            Route::group(['prefix' => 'messages'], function () {
                
                Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
                
                Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
                
                Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
                
                Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
                
                Route::delete('{id}', ['as' => 'messages.destroy', 'uses' => 'MessagesController@destroy']);
                
                Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
            });            
            
            Route::get('/', 'ProfileController@index');

            Route::get('/security', 'ProfileController@security');

            Route::post('/updatephoto', 'ProfileController@updatePhoto');

            Route::patch('/updateprofile', 'ProfileController@updateProfile');

            Route::post('/updatepassword', 'ProfileController@updatePassword');
        });
    });
});

    Route::group(['prefix' => 'admin'], function () {
        Route::group(['namespace' => 'Admin'], function () {
            Route::group(['middleware' => ['role:Moderator,view-backend']], function () {
                Route::get('/', 'AdminController@index');
            });

            Route::group(['middleware' => ['role:Moderator,manage-users']], function () {
                Route::resource('users', 'UsersController', ['except' => ['show', 'create']]);
            });

            Route::group(['middleware' => ['role:Administrator,manage-roles']], function () {
                Route::resource('roles', 'RolesController', ['except' => ['show', 'create']]);
            });

            Route::group(['middleware' => ['role:Administrator,manage-permissions']], function () {
                Route::resource('permissions', 'PermissionsController', ['except' => ['show', 'create']]);
            });

            Route::group(['middleware' => ['role:Administrator,manage-settings']], function () {
                Route::get('settings', 'SettingsController@index');

                Route::put('settings/updateSettings', [
                  'uses' => 'SettingsController@updateSettings',
                  'as'   => 'settings.updateSettings', ]);

                Route::get('settings/activity', 'SettingsController@activity');

                Route::get('settings/backup', 'BackupController@index');

                Route::post('settings/backup/store', [
                    'as' => 'storebackup', 'uses' => 'BackupController@store', ]);

                Route::delete('settings/backup/file', 'BackupController@deleteFile');

                Route::delete('settings/backup/folder', 'BackupController@deleteFolder');

                Route::DELETE('settings/backup/destroy/{id}', [
                    'as' => 'destroybackup', 'uses' => 'BackupController@destroy', ]);

                Route::get('settings/backup/get/{name}', [
                    'as' => 'getdbbackup', 'uses' => 'BackupController@get', ]);
            });

            Route::group(['middleware' => ['role:Administrator,manage-uploads']], function () {
                Route::get('upload', 'UploadController@index');

                Route::post('upload/folder', 'UploadController@createFolder');
                Route::delete('upload/folder', 'UploadController@deleteFolder');

                Route::post('upload/file', 'UploadController@uploadFile');
                Route::delete('upload/file', 'UploadController@deleteFile');
            });
        });
    });
