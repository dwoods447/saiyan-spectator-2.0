<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TVShowController;
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



// Get all episodes for a series
Route::get('/show/{show}/series/{series}', [TVShowController::class, 'getEpisodesBySeries']);

// Get all episodes for a season
Route::get('/show/{show}/season/{season}', [TVShowController::class, 'getEpisodesBySeason']);

// Get episode by id 
Route::get('/show/{show}/season/{season}/episode/{episode}', [TVShowController::class, 'getEpisodeById']);
