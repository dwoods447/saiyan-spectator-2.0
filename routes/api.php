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



// Get all seasons for a series by shortcode
Route::get('/seasons/{short_code}/short_code', [TVShowController::class, 'getAllSeasonsForSeriesByShortCode']);

// Get all epsiodes for a season by shortcode
Route::get('/epsiodes/all/{short_code}/season/{seasonNumber}', [TVShowController::class, 'getAllEpisodesGivenSeason']);

// Get all episodes for a series by shortcode
Route::get('/series/{short_code}/short_code', [TVShowController::class, 'getAllEpisodesForSeriesByShortCode']);

// Get all episodes for a series by seasonid
Route::get('/series/{series}/series_id', [TVShowController::class, 'getEpisodesForSeriesById']);

// Get all episodes for a season
Route::get('/series/{series}/season/{season}', [TVShowController::class, 'getEpisodesBySeason']);

// Get episode by id 
Route::get('/show/{show}/season/{season}/episode/{episode}', [TVShowController::class, 'getSpecificEpisode']);
