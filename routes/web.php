<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\BookmakerController;

// Les routes principales de l'application
Route::get('/', [MatchController::class, 'index'])->name('home');
Route::get('/calendar', [MatchController::class, 'calendar'])->name('calendar');
Route::get('/matchs', [NewsController::class, 'index'])->name('news');
Route::get('/stats/team/{id}', [StatsController::class, 'team'])->name('stats.team');
Route::get('/stats/player/{id}', [StatsController::class, 'player'])->name('stats.player');
Route::get('/leagues', [LeagueController::class, 'index'])->name('leagues');
Route::get('/leagues/{id}/standings', [LeagueController::class, 'standings'])->name('leagues.standings');
Route::get('/bookmaker/{slug}', [BookmakerController::class, 'show'])->name('bookmaker.show');
Route::get('/Bonus', [BookmakerController::class, 'Bonus'])->name('Bonus');
Route::get('news/detail', [BookmakerController::class, 'detail'])->name('detail');
Route::get('news/LTEPRO', [BookmakerController::class, 'LTEPRO'])->name('LTEPRO');