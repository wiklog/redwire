<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AbsenceRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Absence;
use App\Models\Motif;
use App\Models\User;

class AbsenceController extends Controller
{
    /**
     * Summary of index
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();
        $motifs = Motif::all();
        $absences = Absence::withTrashed()->get();

        return view('absence.index', compact('absences', 'users', 'motifs'));
    }

    /**
     * Summary of create
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        // if (Auth::user()->can('absence-create')) {
            $users = User::all();
            $motifs = Motif::all();
            Absence::all();
            return view('absence.create', compact('users', 'motifs'));
        // }
        // abort('401');
    }

    /**
     * Summary of store
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function store(AbsenceRequest $request)
    {
        // if (Auth::user()->can('absence-create')) {

            $data = $request->all();
            $absence = new absence();

            $absence->user_id = $data['user'];
            $absence->motif_id = $data['motif'];
            $absence->date_debut = $data['debut'];
            $absence->date_fin = $data['fin'];
            $absence->status = $data['status'];

            $absence->save();

            $users = User::all();
            $motifs = Motif::all();
            $absences = Absence::all();

            return redirect()->route('absence.index', compact('absences', 'motifs', 'users'));
        // }
        // abort('401');
    }

    /**
     * Summary of show
     *
     * @param \App\Models\Absence $absence
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Absence $absence)
    {
        if (Auth::user()->can('absence-show')) {

            return view('absence.show', compact('absence'));
        }
        abort('401');
    }

    /**
     * Summary of edit
     *
     * @param \App\Models\Absence $absence
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Absence $absence)
    {
        if (Auth::user()->can('absence-edit')) {

            $users = User::all();
            $motifs = Motif::all();

            return view('absence.edit', compact('absence', 'motifs', 'users'));
        }
        abort('401');
    }

    /**
     * Summary of update
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Absence $absence
     *
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function update(AbsenceRequest $request, Absence $absence)
    {
        if (Auth::user()->can('absence-edit')) {

            $data = $request->all();

            $absence->user_id = $data['user'];
            $absence->motif_id = $data['motif'];
            $absence->date_debut = $data['debut'];
            $absence->date_fin = $data['fin'];

            $absence->save();

            $users = User::all();
            $motifs = Motif::all();
            $absences = Absence::all();

            return redirect()->route('absence.index', compact('absences', 'motifs', 'users'));
        }
        abort('401');
    }

    /**
     * Summary of destroy
     *
     * @param \App\Models\Absence $absence
     *
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Absence $absence)
    {
        if (Auth::user()->can('absence-delete')) {

            $absence->delete();
            $absences = Absence::all();

            return redirect()->route('absence.index', compact('absences'));
        }
        abort('401');
    }

    /**
     * Summary of restore
     *
     * @param \App\Models\Absence $absence
     *
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function restore(Absence $absence)
    {
        if (Auth::user()->can('absence-delete')) {

        $absence->restore();
        $absences = Absence::all();
        return redirect()->route('absence.index', compact('absences'));
        }
        abort('401');
    }


    public function demande(Absence $absence)
    {
        if (Auth::user()->isA('admin')) {

        $absences = Absence::all();
        return redirect()->route('absence.demande', compact('absences'));
        }
        abort('401');
    }
}
