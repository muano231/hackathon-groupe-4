<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\HomeController;
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



Route::middleware(['auth:api', 'verified'])->group(function () {
    Route::get('/user', function (Request $request) {
        $user = Auth::user();
        $user->load('roles');
        $user->role = $user->roles->first()->name;
        unset ($user->roles);
        return response()->json($user);
    });
    Route::resource('/users', UserController::class);
    Route::resource('/tests', TestController::class);
    Route::resource('/sessions', SessionController::class);
    Route::resource('/studies', StudyController::class);


    Route::post('/user/{studyId}/ask', [\App\Http\Controllers\StudyPermissionController::class, 'askPermission']);
    Route::middleware('role:admin')->group(function () {
        Route::get('graph', array(HomeController::class, 'getCharts'));
        Route::get('pdf_download', [HomeController::class, 'getChartsPdf'])->name('download');
        Route::post('/user/{user}/verify', [\App\Http\Controllers\AuthController::class, 'verifyUser']);
        Route::post('/user/{user}/{sessionId}/add', [\App\Http\Controllers\SessionPermissionController::class, 'addPermission']);
        Route::post('/user/{user}/{studyId}/remove', [\App\Http\Controllers\SessionPermissionController::class, 'removePermission']);
    });

});


