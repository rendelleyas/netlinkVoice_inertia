<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Auth;

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

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);

Route::middleware('auth')->group(function() {

    Route::get('/', function () {
        return Inertia::render('Home', [
            'name' => 'Rendell Pogi',
            'frameworks' => [
                'Laravel', 'Vue', 'Inertia'
            ],
        ]);
    });
    
    
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/create', [UserController::class, 'create']) 
        // })->middleware('can:create, App\Models\User');
        ->can('create', 'App\Models\User'); //you can use either of can() or middleware()
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{id}/edit', [UserController::class, 'edit']);
    Route::put('/users/{id}/edit', [UserController::class, 'update']);

    
    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });
    
    Route::post('/logout', [LoginController::class, 'destroy']);
});

