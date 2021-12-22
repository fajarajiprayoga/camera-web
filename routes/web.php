<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TransactionController;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

// subscriber
Route::post('/', [DashboardController::class, 'storeSubscriber'])->name('subscriber');

//Resource Router Admin
Route::prefix('admin')
->middleware(['auth'])
->group(function(){
    Route::resource('dashboard', DashboardController::class);
    Route::resource('items', ItemController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('transaction', TransactionController::class);
    Route::get('/exportsubscribers', [DashboardController::class, 'subscriberExport'])->name('subexport');
    Route::get('/cetakstruk', function(){
        return view('pages.transaction.detail');
    })->name('cetakstruk');
});

require __DIR__.'/auth.php';
