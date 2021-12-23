<?php

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SuivisController;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FabricationController;
use App\Models\Fabrication;
use App\Models\Ventes;

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

Route::middleware(['auth'])->group(function () {

    Route::resource('roles', RoleController::class);

    Route::get('/', [AcceuilController::class, "index"])->name("acceuil");

    Route::get("stocks", [StockController::class, 'index'])->name("stocks");

    Route::get("suivis", [SuivisController::class, 'index'])->name("suivis");

    Route::get("fabrication", [FabricationController::class, 'index'])->name("fabrication");

    Route::get("fabrication/{id}", [FabricationController::class, 'details'])->name("detailsDevis");

    Route::get("finaliser/{id}", [FabricationController::class, 'finaliser'])->name("finaliser");

    Route::post("fabrication", [FabricationController::class, 'store'])->name("devis");

    Route::get("users", [RegisteredUserController::class, 'create'])->name("users");

    Route::post("users", [RegisteredUserController::class, 'store'])->name("store.users");

    Route::get("receipt/{id}", function ($id) {
        return view("receipt.index", [
            'id' => Fabrication::find($id)
        ]);
    })->name("receipt");

    Route::get("vente-receipt/{id}", function ($id) {
        return view("receipt.venteReceipt", [
            'id' => Ventes::find($id)
        ]);
    })->name("receipt-vente");

    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name("logout");
});
//
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
