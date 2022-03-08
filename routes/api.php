<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\TestAnswerController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::resource('/products', ProductController::class);
Route::resource('/answers', AnswerController::class);
Route::resource('/questions', QuestionController::class);
Route::resource('/tests', TestController::class);
Route::resource('/sessions', SessionController::class);
Route::resource('/studies', StudyController::class);
Route::resource('/users', UserController::class);
Route::resource('/answers', TestAnswerController::class);
Route::resource('/test_answers', TestAnswerController::class);




Route::middleware('auth:api')->group(function (){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::middleware('roles:Admin')->group(function(){
       Route::get('import_questions', [\App\Http\Controllers\HomeController::class,'importQuestions']);
    });

});

