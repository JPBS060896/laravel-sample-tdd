<?php

use App\Http\Controllers\NotesController;
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

Route::prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/notes/create', [NotesController::class, 'store'])->name('create');
    Route::get('/notes/show/{id}', [NotesController::class, 'show'])->name('show');
    Route::put('/notes/update/{id}', [NotesController::class, 'update'])->name('update');
    Route::delete('/notes/delete/{id}', [NotesController::class, 'delete'])->name('delete');
});
