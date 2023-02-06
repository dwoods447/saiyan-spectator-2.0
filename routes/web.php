<?php
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Series as Series;
use App\Models\Character as Character;
use App\Http\Controllers\TVShowController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $seriesList = Series::all();
    return Inertia::render('Home', [
        'seriesList' =>  $seriesList
    ]);
});

Route::get('/series/list', function () {
    $seriesList = Series::all();
    return Inertia::render('PrivateVideos', [
        'seriesList' =>  $seriesList
    ]);
});

Route::get('/character/list', function () {
    $characters = Character::all();
    return Inertia::render('Characters', [
        'characterList' =>  $characters
    ]);
});


Route::get('/{show}/seasonlist', [TVShowController::class, 'getAllSeasonsForSeriesByShortCode'])->name('seasonlist');

Route::get('/{short_code}/season/{season}', [TVShowController::class, 'getAllEpisodesForASeason'])->name('episodeList');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
