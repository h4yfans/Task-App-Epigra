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

Route::group(['middleware' => 'auth'], function () {

    /*Create and display the TodoList*/
    Route::get('/new-list', 'TodoController@getAddListAction')->name('get.addnewtasklist');
    Route::post('/new-list/', 'TodoController@postAddListAction')->name('post.addnewtasklist');

    /*Create and display the Task */
    Route::get('/', 'TaskController@getTaskListAction')->name('index');
    Route::post('/newtask/{id}', 'TaskController@postAddTaskAction')->name('post.addnewtask');

    /*Update and display the Task*/
    Route::get('/todos/task/{id}', 'TaskController@getUpdateTaskAction')->name('get.taskupdate');
    Route::post('/todos/task/{id}', 'TaskController@postUpdateTaskAction')->name('post.taskupdate');

    /*Delete the Task*/
    Route::get('/todos/task/del/{id}', 'TaskController@getDeleteTaskAction')->name('get.taskdelete');

    /*TodoList Details*/
    Route::get('/todos/details/{id}', 'TodoController@getTaskListDetails')->name('get.tododetails');

    /*Display all Todos*/
    Route::get('/todos/all', 'TodoController@getAllTaskList')->name('get.alltodos');

    /*Follow the TodoList*/
    Route::get('/todo/follow/{id}', 'FollowedTodoController@getAddFollowTodoList')->name('get.addfollowtodo');

    /*Unfollow the TodoList*/
    Route::get('/todo/unfollow/{id}','FollowedTodoController@getUnfollowTodoList')->name('get.unfollowtodo');

    /*Get Followed TodoList*/
    Route::get('/fodos/followed', 'FollowedTodoController@getFollowTodoList')->name('get.followtodolist');

    /*Get User's info*/
    Route::get('/users/info', 'UserController@getUsersInfo')->name('get.userinfo');

    Route::get('/users', function () {
        return view('users');
    })->name('users');


});


/*Route::get('/new-list', function(){
    return view('new-list');
})->name('new-list');*/


Auth::routes();

Route::get('/home', 'HomeController@index');
