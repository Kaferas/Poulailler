<?php

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SuivisController;
use App\Http\Controllers\AcceuilController;

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

// Route::group(['middleware' => ['auth']], function () {
Route::resource('roles', RoleController::class);

Route::get('/', [AcceuilController::class, "index"])->name("acceuil");

Route::get("stocks", [StockController::class, 'index'])->name("stocks");

Route::get("suivis", [SuivisController::class, 'index'])->name("suivis");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
// });
