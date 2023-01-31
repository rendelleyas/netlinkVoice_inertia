<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(Request $request){
        return Inertia::render('Users/Index',[    
            'users' => User::when($request->search, function ($query, $search){
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->through(fn($users) => [
                    'id' => $users->id,
                    'name' => $users->name,
                    'can' => [
                        'editable' => Auth::user()->can('edit', $users), // if the user is editable by the authenticated user
                    ]
                ])
                ->withQueryString(), //preserve the state of the request param : paginate and filter
                
            'filters' => FacadesRequest::only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class),
            ],
        ]);
    }

    public function create(){
        return Inertia::render('Users/Create');
    }

    public function store(){
        $validation = FacadesRequest::validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'password' => 'required',
        ]);
        User::create($validation);
        return redirect('/users');
    }

    public function edit($id){
        return Inertia::render('Users/Edit', [
            'user' => User::where('id', $id)->first(),
        ]);
    }

    public function update($id){

        $validation = FacadesRequest::validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email,'.$id],
        ]);

        User::where('id', $id)->update($validation);

        return redirect('/users');
    }
}
