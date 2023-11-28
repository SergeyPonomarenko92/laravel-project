<?php

use App\Http\Controllers\api\RecursionController;
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
Route::pattern('pattern', '^[ryg]+$');
Route::pattern('index', '[1-9]+$');
Route::get('/nesting/{i}', [RecursionController::class, 'show']);
Route::get('/fibonacci/{index}', [RecursionController::class, 'fibonacci']);
Route::get('/apples/{pattern}/{index}', [RecursionController::class, 'apples']);
