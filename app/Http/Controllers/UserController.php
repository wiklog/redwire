<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Absence;
use App\Models\Motif;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Summary of index
     *
     * @param \App\Models\User $users
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(User $users)
    {
        //$users = User::all();
        $users = User::withTrashed()->get();

        return view('User.index', compact('users'));
    }

    /**
     * Summary of create
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view(view: 'User.create');
    }

    /**
     * Summary of store
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
    }

    /**
     * Summary of show
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        $absences = Absence::where('user_id', $user->id)->get();
        $motifs = Motif::all();

        return view('user.show', compact('user', 'absences', 'motifs'));
    }

    /**
     * Summary of edit
     *
     * @param \App\Models\User $user
     *
     * @return void
     */
    public function edit(User $user)
    {
    }

    /**
     * Summary of update
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     *
     * @return void
     */
    public function update(Request $request, User $user)
    {
    }

    /**
     * Summary of destroy
     *
     * @param \App\Models\User $user
     *
     * @return void
     */
    public function destroy(User $user)
    {
        if(Auth::user()->can('user-delete')){
            $nb = Absence::where('user_id', $user->id)->count();

            if ($nb === 0) {
                $user->delete();
            } else {
                session::put('message', "le user est encore utilisé par {$nb} absence(s)");
            }

            $users = User::all();
            return redirect()->route('user.index', compact('users'));
        }
        abort('401');

    }

    /**
     * Summary of restore
     *
     * @param \App\Models\user $user
     *
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function restore(User $user)
    {
        if(Auth::user()->can('user-delete')){
            $user->restore();
            $users = User::all();
            return redirect()->route('user.index', compact('users'));
        }
        abort('401');

    }
}
