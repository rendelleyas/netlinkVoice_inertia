<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

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

Route::get('/', function () {
    return Inertia::render('Home', [
        'name' => 'Rendell Pogi',
        'frameworks' => [
            'Laravel', 'Vue', 'Inertia'
        ],
    ]);
});


Route::get('/users', function ( Request $request) {

    return Inertia::render('Users',[    
        'users' => User::when($request->search, function ($query, $search){
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->through(fn($users) => [
                'id' => $users->id,
                'name' => $users->name
            ])
            ->withQueryString(), //preserve the state of the request param : paginate and filter
        'filters' => FacadesRequest::only(['search'])
    ]);
});


Route::get('/settings', function () {
    return Inertia::render('Settings');
});


Route::post('/logout', function () {
    dd(request('name'));
});