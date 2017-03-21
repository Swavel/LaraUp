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

Route::get('/', function () {
    $u = \App\User::all()->first();
    $u->getMyType();
    /**
     *
     * TODO implement saving method
     * should save setting value "settingvalue" in path
     * "eloquentmodels.user.{userid}.{settingname}"
     * like class.table.id.name
     *
     * */

    $u->setSetting('settingname', 'settingvalue');

    return view('welcome');
});
