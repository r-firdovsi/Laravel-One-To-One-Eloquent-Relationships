<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Address;
use App\User;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function () {
   $user = User::findOrFail(2);

   $address = new Address(['name' => 'Kv. ev 107']);
   $user->address()->save($address);
});

Route::get('/update', function () {
//    $address = Address::where('user_id', '=', 2);
    $address = Address::whereUserId(2)->first();

    $address->name = "Kaverochkin 21 ev 107";

    $address->save();
});

Route::get('/read', function () {
    $user = User::findOrFail(2);
    echo $user->address->name;
});

Route::get('/delete', function () {
    $user = User::findOrFail(2);
    $user->address()->delete();
    return "Done";
});
