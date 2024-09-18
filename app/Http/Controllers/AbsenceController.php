<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Motif;
use App\Models\User;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function index()
    {
        $users = User::all();
        $motifs = Motif::all();
        $absences = Absence::all();
        return view('absence.index', compact('absences', 'users', 'motifs'));
    }

    public function create()
    {
        $users = User::all();
        $motifs = Motif::all();
        Absence::all();
        return view('absence.create', compact('users', 'motifs'));
    }

    public function store(Request $request)
    {
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

    public function show(Absence $absence)
    {
        return view('absence.show', compact('absence'));
    }

    public function edit(Absence $absence)
    {
        $users = User::all();
        $motifs = Motif::all();
        return view('absence.edit', compact('absence',  'motifs', 'users'));
    }

    public function update(Request $request, Absence $absence)
    {
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

    public function destroy(Absence $absence)
    {
        $absence->delete();
        $absences = Absence::all();
        return redirect()->route('absence.index', compact('absences'));
    }
}
