<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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

Route::post('postagem',[PostController::class,'store']);
Route::get('postagem', [PostController::class, 'index']);
Route::get('postagem/{id}', [PostController::class, 'show']);
Route::post('postagem/editar/{id}', [Postcontroller::class, 'edit']);
Route::delete('postagem/deletar/{id}', [PostController::class, 'destroy']);

Route::post('postagem/{id}/comentario', [CommentController::class, 'store']);
Route::get('comentario/{id}', [CommentController::class, 'show']);
Route::get('postagem/{id}/comentario', [CommentController::class,'index']);
Route::post('comentario/editar/{id}', [CommentController::class,'edit']);
Route::delete('comentario/deletar/{id}', [CommentController::class, 'destroy']);


