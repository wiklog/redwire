<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Motif;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $users)
    {
        $users = user::all();
        return view('User.index', compact('users'));
    }

    public function create()
    {
        return view(view: 'User.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        $absences = Absence::where('user_id', $user->id)->get();
        $motifs = Motif::all();

        return view('user.show', compact('user', 'absences', 'motifs'));
    }
    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
