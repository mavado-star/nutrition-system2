<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChildController;

Route::get('/', function(){ return redirect('/login'); });

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [ChildController::class,'index'])->name('dashboard');
    Route::get('/children', [ChildController::class,'index'])->name('children.index');
    Route::get('/children/create', [ChildController::class,'create'])->name('children.create');
    Route::get('/reports/summary', [ChildController::class,'summaryReport'])->name('reports.summary');
    Route::get('/children/{id}/report', [ChildController::class,'report'])->name('children.report');
    Route::post('/children', [ChildController::class,'store'])->name('children.store');
    Route::delete('/children/{id}', [ChildController::class,'destroy'])->name('children.destroy');
});