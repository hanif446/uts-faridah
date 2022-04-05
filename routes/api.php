<?php

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
Route::middleware('auth:sanctum')->post('/user', function (Request $request) {
    return $request->user();
});

Route::post('/2/files/create_folder_v2', [\App\Http\Controllers\WrapperApiController::class,'create_folder_v2'])
->middleware(\App\Http\Middleware\NpmMiddleware::class)
->name('create_folder_v2');

Route::post('/2/files/list_folder', [\App\Http\Controllers\WrapperApiController::class,'list_folder'])
->middleware(\App\Http\Middleware\NpmMiddleware::class)
->name('list_folder');

Route::post('/2/files/copy_v2', [\App\Http\Controllers\WrapperApiController::class,'copy_v2'])
->middleware(\App\Http\Middleware\NpmMiddleware::class)
->name('copy_v2');

Route::post('/2/sharing/create_shared_link', [\App\Http\Controllers\WrapperApiController::class,'create_shared_link'])
->middleware(\App\Http\Middleware\NpmMiddleware::class)
->name('create_shared_link');

Route::post('/2/files/delete_v2', [\App\Http\Controllers\WrapperApiController::class,'delete_v2'])
->middleware(\App\Http\Middleware\NpmMiddleware::class)
->name('delete_v2');

Route::post('2/check/user', [\App\Http\Controllers\WrapperApiController::class,'check_user'])
->middleware(\App\Http\Middleware\NpmMiddleware::class)
->name('check_user');

Route::get('/users/identitas', function(){
	return [
		'code' => '0',
		'data' => [
			'npm' => '197006043',
			'nama' => 'Faridah Hanifah',
			'email' => '197006043@student.unsil.ac.id'
		]
	];
})
->middleware(\App\Http\Middleware\NpmMiddleware::class)
->name('identitas');