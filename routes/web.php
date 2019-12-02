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

    $role = new Role(['name'=>'subscriber']);

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

    $user = User::findOrFail(1);

    if($user->has('roles')){

        //checks if entry has xxx entry value
        //normal if statement

        foreach($user->roles as $role){

            if($role->name == 'Administrator'){
                //strtolower would be used if it was a variable
                $role->name = 'subscriber';

                $role->save();
            }

        }
    }
    
});

Route::get('del', function(){

    $user = User::findOrFail(1);

    foreach($user->roles as $role){

        $role->whereId(4)->delete();
    }

});

/*
Below we are attaching and creating a role to a user

ATTACHES A ROLE TO THE USER, IF DOES NOT EXIST, IT WILL CREATE ANOTHER RECORD. EVEN IF THE MEMBER HAS IT.
*/

Route::get('attach', function(){

    $user = User::findOrFail(1);

    $user->roles()->attach(6);

    //->detach(6) WILL REMOVE THE RELATIONSHIP

});


Route::get('detach', function(){

    $user = User::findOrFail(1);

    $user->roles()->detach();

});

Route::get('sync', function () {

    $user = User::findOrFail(1);

    $user->roles()->sync([1,2]);
    //MUST BE ARRAY
    //Give an ID (or many IDs) & sync to the above user.
});