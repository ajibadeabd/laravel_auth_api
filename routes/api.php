<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\newController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/signup', [authController::class, 'signup']);
Route::post('/login', [authController::class, 'login']);
// Route::get('/loggeduser', [authController::class, 'login']);
// // ->name('home');
// Route::middleware('auth:api')->group( function () {
//     Route::resource('products', newController::class);
// });

// Route::group([ 'middleware' => 'auth:api' ], function() {
// Route::get('/l', [authController::class, 'login']);

//     // Route::get('/comments', 'Admin\CommentController@getAllComments'); //gets all application comments
//     // Route::post('/comments/{commentId}', 'Admin\CommentController@DeleteComment'); //delete a comment
//     // Route::patch('/comments/{commentId}/flag', 'Admin\CommentController@FlagComment'); //flag a comment
//     // Route::patch('/comments/{commentId}', 'Admin\CommentController@updateComment'); //update a comment

//  });
      
Route::middleware('auth:api')->group( function () {
Route::get('/getIt', [authController::class, 'get']);
Route::get('/logout', [authController::class, 'out']);

    // Route::resource('products', ProductController::class);
});