<?php

use App\Http\Controllers\GitHubController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/myrepos', [GitHubController::class, 'myRepos']);
Route::get('/{owner}/{repo}', [GitHubController::class, 'getRepo']);
Route::get('/users-stats', [GitHubController::class, 'usersWithStats']);


