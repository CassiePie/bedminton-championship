<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\AccommodationController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

use App\Http\Controllers\FullCalenderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware(['guest'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware(['guest']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
   
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('players', PlayerController::class);
    Route::resource('events', EventController::class);
    Route::resource('photos', PhotoController::class);

    // Route::get('/full-calendar', [EventController::class, 'index']);
    // Route::post('/full-calendar/action', [EventController::class, 'action']);

});
// guest stuff
Route::resource('accommodations', AccommodationController::class)->only(['index', 'show']);
Route::resource('events', EventController::class)->only(['index', 'show']);
Route::resource('photos', PhotoController::class)->only(['index', 'show']);

Route::get('fullcalender', [FullCalenderController::class, 'index']);
Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);

