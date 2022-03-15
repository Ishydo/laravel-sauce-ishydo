<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

use App\Http\Controllers\DashboardController;

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

Route::get('language/{locale}', function ($locale) {
    App::setLocale($locale);
    session(['locale' => $locale]);
    return redirect()->back();
});

Route::get('/', function() {
    return view('welcome');
})->name('home');


Route::middleware(['auth'])->group(
    function () {
        Route::prefix('dashboard')->group(
            function () {
                Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
            }
        );
    }
);

require __DIR__.'/auth.php';
