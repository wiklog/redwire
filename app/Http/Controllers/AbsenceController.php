<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function index()
    {
        return view('absence.index');
    }

    public function create()
    {
        return view(view: 'absence.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $absence = Absence::findOrFail($id);

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
