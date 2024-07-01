<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Projects\ProjectController;
use App\Http\Controllers\Projects\ProjectCommentController;
use App\Http\Controllers\Tasks\TaskController;
use App\Http\Controllers\Tasks\TaskCommentController;
use App\Http\Controllers\Admin\SendInventionController;
use App\Http\Controllers\Admin\ShowInvitaions;
use App\Http\Controllers\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//-----------------------comment project Routes--------------
Route::controller(ProjectCommentController::class)->group(function(){
    Route::get('commentPro/getAll','show');
    Route::post('commentPro/create','create');
    Route::post('commentPro/update','update');
    Route::delete('commentPro/delete','destroy');
});

//-----------------------task Routes------------------------
Route::controller(TaskController::class)->group(function(){
    Route::get('task/getAll','show');
    Route::post('task/changeStatus','changeStatusTask');
    Route::post('task/create','create');
    Route::post('task/update','update');
    Route::delete('task/delete','destroy');

});

//-----------------------comment task Routes-----------------
Route::controller(TaskCommentController::class)->group(function(){
    Route::get('commentTask/getAll','show');
    Route::post('commentTask/create','create');
    Route::post('commentTask/update','update');
    Route::delete('commentTask/delete','destroy');
});


//-----------------------user Routes------------------------
Route::post('login',[UserController::class,'login']);
Route::post('signUp',[UserController::class,'signUp']);

//-----------------------Admin Routes------------------------
// Route::middleware(['role:admin'])->group(function () {
//-----------------------project Routes----------------------
Route::controller(ProjectController::class)->group(function(){
    Route::get('project/getAll','show');
    Route::get('project/getproject','showDetailProject');
    Route::post('project/create','create');
    Route::post('project/update','update');
    Route::delete('project/delete','destroy');
});
    Route::post('sendInvitation',[SendInventionController::class,'sendInvitation']);
    Route::get('ShowInvitation',[ShowInvitaions::class,'ShowInvitation']);
    // });