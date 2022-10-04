<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/students', [StudentController::class, 'getAllStudents']);
Route::post('/student', [StudentController::class, 'addStudent']);
Route::get('/student/{matricule}', [StudentController::class, 'getStudent']);
Route::patch('/student/{matricule}', [StudentController::class, 'updateStudent']);
Route::delete('/student/{matricule}', [StudentController::class, 'deleteStudent']);
