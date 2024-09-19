<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Motif;
use App\Models\User;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();
        $motifs = Motif::all();
        $absences = Absence::all();

        return view('absence.index', compact('absences', 'users', 'motifs'));
    }

    /**
     * Summary of create
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $users = User::all();
        $motifs = Motif::all();
        Absence::all();

        return view('absence.create', compact('users', 'motifs'));
    }

    /**
     * Summary of store
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'motif_id' => 'required|exists:motifs,id',
            'date_debut' => 'required|date|before:date_fin',
            'date_fin' => 'required|date|after:date_debut',
        ]);

        $data = $request->all();
        $absence = new absence();

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

    /**
     * Summary of show
     * @param \App\Models\Absence $absence
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Absence $absence)
    {
        return view('absence.show', compact('absence'));
    }

    /**
     * Summary of edit
     * @param \App\Models\Absence $absence
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Absence $absence)
    {
        $users = User::all();
        $motifs = Motif::all();

        return view('absence.edit', compact('absence', 'motifs', 'users'));
    }

    /**
     * Summary of update
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Absence $absence
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Absence $absence)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'motif_id' => 'required|exists:motifs,id',
            'date_debut' => 'required|date|before:date_fin',
            'date_fin' => 'required|date|after:date_debut',
        ]);

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

    /**
     * Summary of destroy
     * @param \App\Models\Absence $absence
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Absence $absence)
    {
        $absence->delete();
        $absences = Absence::all();

        return redirect()->route('absence.index', compact('absences'));
    }
}
