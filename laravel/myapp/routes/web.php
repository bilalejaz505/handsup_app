<?php

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
    return view('login');
});

Route::post('auth/login', 'auth@login');

Route::get('mycontroller/add', function () {
    return view('add');
});

Route::get('register/add', function () {
    return view('register/add');
});

Route::get('users', 'Users@index');
Route::get('users/add', 'Users@add');
Route::post('users/save', 'Users@save');
Route::get('users/view/{id}', 'Users@view');
Route::get('users/edit/{id}', 'Users@edit');
Route::get('users/update/{id}', 'Users@update');
Route::get('users/delete/{id}', 'Users@delete');
Route::get('users/customFuncController/{id}', 'Users@customFuncController');
Route::get('users/viewAll', 'Users@viewAll');
Route::get('users/viewSingle/{id}', 'Users@viewSingle');
Route::any('users/customSave', 'Users@customSave');
Route::any('users/customUpdate', 'Users@customUpdate');
Route::get('users/customDeleteSingle/{id}', 'Users@customDeleteSingle');
Route::get('users/customDeleteAll', 'Users@customDeleteAll');
/*Route::get('users/view/{id}',function ($id) {
    $user = \App\User::find($id);
    return $user->name;
    //return view('about');
});*/
Route::post('mycontroller/save', 'mycontroller@save');
Route::get('mycontroller/myfunction/{id}', 'mycontroller@show');
Route::get('mycontroller/myfunction', 'mycontroller@myfunction');

/*Route::any('mycontroller/myfunction', function () {
    return Redirect::to('mycontroller/myfunction');
});*/

Route::get('about',function () {
    return 'About Page Content';
    //return view('about');
});

Route::get('about/direction',function () {
    return 'About Page Content with directions';
    //return view('about');
});

Route::get('about/{theSub}',function ($theSub) {
    if ($theSub == 'here')
        return 'in if';
    else
        return 'in else';
    //return $theSub.' About Page Content';
    //return view('about');
});

Route::get('about/direction', array('as' => 'directions', function () {
    $theURL = URL::route('directions');
    return "Directions simplfied route with as $theURL";
    //return view('about');
}));

Route::get('where',function () {
    return Redirect::to('about/direction');
    //return view('about');
});

Route::get('where',function () {
    return Redirect::route('directions');
    //return view('about');
});

/*Route::get('mycontroller/myfunction', array('as' => 'myroute', function () {
    $theURL = URL::route('myroute');
    return Redirect::to($theURL);
}));*/
