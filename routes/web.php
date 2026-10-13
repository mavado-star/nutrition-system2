<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\SuperAdmin\ClinicController;

Route::get('/', function(){ return redirect('/dashboard'); });

Route::middleware(['auth'])->group(function(){
    
    // ALL CLINICS - Block if subscription expired (except super_admin)
    Route::middleware(['check_subscription'])->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/children', [ChildController::class, 'index']);
        Route::get('/children/create', [ChildController::class, 'create']);
        Route::post('/children', [ChildController::class, 'store']);
        Route::get('/children/{id}/delete', [ChildController::class, 'destroy']);
    });

    // SUPER ADMIN ONLY - MASOLO Labs
    Route::middleware(['is_super_admin'])->prefix('super-admin')->group(function(){
        Route::get('/clinics', [ClinicController::class, 'index'])->name('superadmin.clinics');
        Route::get('/clinics/create', [ClinicController::class, 'create']);
        Route::post('/clinics', [ClinicController::class, 'store']);
        Route::post('/clinics/{clinic}/toggle', [ClinicController::class, 'toggleSubscription']);
        Route::get('/clinics/{clinic}', [ClinicController::class, 'show']);
    });
});

Route::get('/subscription/expired', function(){
    return view('subscription.expired');
})->name('subscription.expired');

require __DIR__.'/auth.php';