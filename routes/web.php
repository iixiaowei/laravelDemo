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
    return view('welcome');
});


Route::get('foo',function(){
    return 'Hello World';    
});

Route::get('user/{id}',function($id){
    return "User".$id;
});

Route::get('user/{name?}',function($name="join"){  return $name;  })->name('aname');

Route::get('user/profile','StudentController@showProfile')->name('profile');


Route::get('student','StudentController@index');
Route::get('query4','StudentController@query4');
Route::get('query5','StudentController@query5');
Route::get('maopao','StudentController@maopao');
Route::get('info','StudentController@info');

Route::group(['prefix'=>'admin','namespace'=>'admin'],function(){
    
    Route::get('login',function(){
        return 'login';    
    });

});


Route::any('upload','StudentController@upload');
Route::any('mail','StudentController@mail');
Route::any('cache1','StudentController@cache1');
Route::any('cache2','StudentController@cache2');

Route::group(['middleware'=>['web']],function(){
	Route::get('student/test','StudentController@test');
	Route::get('student/member','StudentController@member');
	Route::any('student/create','StudentController@create');
	Route::any('student/update/{id}','StudentController@update');
	Route::any('student/delete/{id}','StudentController@delete');
	Route::get('student/detail/{id}','StudentController@detail');
	
});










Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
