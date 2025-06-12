<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\CausalController;
use App\Http\Controllers\ObservationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\TypeActivityController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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
 
route::get('/',[Authcontroller::class, 'index']);

Route::middleware('auth')->get('/index', function () {
    return view('index');
})->name('index');

/* Route::get('/test2',function(){
    return view('test2');
})->name('test2');  */



//Ruta para AUTH 
Route::prefix('auth')->group(function () {
    route::get('/index',[AuthController::class, 'index'])->name('auth.index');
    route::post('/login',[AuthController::class, 'login'])->name('auth.login');
    route::get('/register',[AuthController::class, 'create'])->name('auth.register');
    route::post('/register',[AuthController::class, 'store'])->name('auth.store');
});

Route::middleware(['auth', 'can:admin-supervisor'])->prefix('auth')->group(function () {
    route::get('/logout',[AuthController::class, 'logout'])->name('auth.logout');
});



// RUTA PARA CAUSAL
Route::middleware(['auth', 'can:administrador'])->prefix('causal')->group(function(){
    Route::get('/index',[CausalController::class, 'index'])->name('causal.index');
    Route::get('/create',[CausalController::class, 'create'])->name('causal.create'); 
    Route::get('/edit/{id}',[CausalController::class, 'edit'])->name('causal.edit');
    Route::post('/store',[CausalController::class, 'store'])->name('causal.store');
    Route::put('/update/{id}',[CausalController::class,'update'])->name('causal.update');
    Route::get('/destroy/{id}',[CausalController::class, 'destroy'])->name('causal.destroy');    
});

// RUTA PARA OBSERVATION
Route::middleware(['auth', 'can:administrador'])->prefix('observation')->group(function(){
    Route::get('/index',[ObservationController::class, 'index'])->name('observation.index');
    Route::get('/create',[ObservationController::class, 'create'])->name('observation.create'); 
    Route::get('/edit/{id}',[ObservationController::class, 'edit'])->name('observation.edit');
    Route::post('/store',[ObservationController::class, 'store'])->name('observation.store');
    Route::put('/update/{id}',[ObservationController::class,'update'])->name('observation.update');
    Route::get('/destroy/{id}',[ObservationController::class, 'destroy'])->name('observation.destroy');    
});


// RUTA PARA TYPE_ACTIVITY
Route::middleware(['auth', 'can:administrador'])->prefix('typeactivity')->group(function(){
    Route::get('/index',[TypeActivityController::class, 'index'])->name('typeactivity.index');
    Route::get('/create',[TypeActivityController::class, 'create'])->name('typeactivity.create'); 
    Route::get('/edit/{id}',[TypeActivityController::class, 'edit'])->name('typeactivity.edit');
    Route::post('/store',[TypeActivityController::class, 'store'])->name('typeactivity.store');
    Route::put('/update/{id}',[TypeActivityController::class,'update'])->name('typeactivity.update');
    Route::get('/destroy/{id}',[TypeActivityController::class, 'destroy'])->name('typeactivity.destroy');    
});


// RUTA PARA ACTIVITY
Route::middleware(['auth', 'can:admin-supervisor'])->prefix('activity')->group(function(){
    Route::get('/index',[ActivityController::class, 'index'])->name('activity.index');
    Route::get('/create',[ActivityController::class, 'create'])->name('activity.create'); 
    Route::get('/edit/{id}',[ActivityController::class, 'edit'])->name('activity.edit');
    Route::post('/store',[ActivityController::class, 'store'])->name('activity.store');
    Route::put('/update/{id}',[ActivityController::class,'update'])->name('activity.update');
    Route::get('/destroy/{id}',[ActivityController::class, 'destroy'])->name('activity.destroy');    
});


// RUTA PARA ORDER
Route::middleware(['auth', 'can:admin-supervisor'])->prefix('order')->group(function(){
    Route::get('/index',[OrderController::class, 'index'])->name('order.index');
    Route::get('/create',[OrderController::class, 'create'])->name('order.create'); 
    Route::get('/edit/{id}',[OrderController::class, 'edit'])->name('order.edit');
    Route::post('/store',[OrderController::class, 'store'])->name('order.store');
    Route::put('/update/{id}',[OrderController::class,'update'])->name('order.update');
    Route::get('/destroy/{id}',[OrderController::class, 'destroy'])->name('order.destroy');    
    Route::get('/add_activity/{order_id}/{activity_id}',[OrderController::class, 'add_activity'])->name('order.add_activity');    
    Route::get('/remove_activity/{order_id}/{activity_id}',[OrderController::class, 'remove_activity'])->name('order.remove_activity');    
});


// RUTA PARA TECHNICIAN
Route::middleware(['auth', 'can:supervisor'])->prefix('technician')->group(function(){
    Route::get('/index',[TechnicianController::class, 'index'])->name('technician.index');
    Route::get('/create',[TechnicianController::class, 'create'])->name('technician.create'); 
    Route::get('/edit/{id}',[TechnicianController::class, 'edit'])->name('technician.edit');
    Route::post('/store',[TechnicianController::class, 'store'])->name('technician.store');
    Route::put('/update/{id}',[TechnicianController::class,'update'])->name('technician.update');
    Route::get('/destroy/{id}',[TechnicianController::class, 'destroy'])->name('technician.destroy');    
});

//Ruta reportes de administrador
Route::middleware(['auth', 'can:administrador'])->prefix('reports')->group(function () {
    route::get('/index',[ReportController::class, 'index'])->name('reports.index');
    route::get('/export_technicians',[ReportController::class, 'export_technicians'])->name('reports.technicians');
});

//ruta reporte actividad por tecnico
Route::middleware(['auth', 'can:administrador'])->prefix('reports')->group(function () {
    route::get('/index',[ReportController::class, 'index'])->name('reports.index');
    route::get('/export_technicians',[ReportController::class, 'export_technicians'])->name('reports.technicians');
    route::post('/export_activities_by_technician',[ReportController::class, 'export_activities_by_technician'])
    ->name('reports.activities_technician');
});

Route::middleware(['auth', 'can:administrador'])->prefix('reports')->group(function () {
    route::get('/index',[ReportController::class, 'index'])->name('reports.index');
    route::post('/export_order_by_date',[ReportController::class, 'export_order_by_date'])
    ->name('reports.order_date');
});

Route::middleware(['auth', 'can:administrador'])->prefix('users')->group(function () {
    route::get('/index',[UsersController::class, 'index'])->name('users.index');
    route::post('/send_email',[UsersController::class, 'send_email'])->name('users.send_email');
});