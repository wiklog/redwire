<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function index()
    {
        return view('{{ modelVariable}}.index');
    }

    public function create()
    {
        return view(view: '{{ modelVariable}}.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Absence $absence)
    {
        return view(view: 'absence.show');

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
