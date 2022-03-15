<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\ScanController;


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

Route::prefix('demo')->group(
    function(){
        Route::get('/win', [DemoController::class, 'win'])->name('demo.win');
        Route::get('/lose', [DemoController::class, 'lose'])->name('demo.lose');
    }
);

Route::middleware(['auth'])->group(
    function () {
        Route::prefix('dashboard')->group(
            function () {
                Route::resource('codes', CodeController::class);
                Route::resource('companies', CompanyController::class);
                Route::resource('scans', ScanController::class);
                Route::get('/manage', [ScanController::class, 'manage'])->name('dashboard.manage');
                Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
            }
        );
    }
);

require __DIR__.'/auth.php';
