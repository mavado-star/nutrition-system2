<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChildController;

Route::get('/', function(){ return redirect('/dashboard'); });

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/children', [ChildController::class, 'index']);
    Route::get('/children/create', [ChildController::class, 'create']);
    Route::post('/children', [ChildController::class, 'store']);
    Route::get('/children/{id}/delete', [ChildController::class, 'destroy']);
});

require __DIR__.'/auth.php';