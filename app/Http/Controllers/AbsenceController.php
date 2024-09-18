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
        return view(view: 'absence.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Absence $absence)
    {
        return view('absence.show', compact('absence'));
    }

    public function edit(Absence $absence)
    {
        //
    }

    public function update(Request $request, Absence $absence)
    {
        //
    }

    public function destroy(Absence $absence)
    {
        //
    }
}
