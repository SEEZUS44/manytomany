<?php

use App\User;
use App\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('create', function () {
    
    $user = User::find(1);

    $role = new Role(['name'=>'Administrator']);

    $user->roles()->save($role);

    //OR $user->roles()->save(new Role(['name'=>'Administrator']););
    //Replacing the need to store the value within the variable

});

Route::get('read', function () {
    
    $user = User::findOrFail(1);

    foreach($user->roles as $role){

        // dd($role);
        // This will then show you the array and connects

        echo $role->name.'<br>';
        //or echo $role
    }

});

Route::get('update', function () {


    
});