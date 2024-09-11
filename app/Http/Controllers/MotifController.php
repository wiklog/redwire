<?php

namespace App\Http\Controllers;

use App\Models\Motif;
use Illuminate\Http\Request;

class MotifController extends Controller
{
    public function index()
    {
        $liste = Motif::all();
        dd($liste);
        return view('motif.index');
    }

    public function create()
    {
        Motif::all();
        return view('motif.create');
    }

    public function store(Request $request)
    {
        $motifs = new motif();

        $motifs->titre = 'Ma femme';
        $motifs->is_accessible_salarie = '0';

        $motifs->save();

        return view('motif.index');
    }

    public function show(Motif $motif)
    {
        //
    }

    public function edit(Motif $motif)
    {

    }

    public function update(Request $request, Motif $motif)
    {
        //
    }

    public function destroy(Motif $motif)
    {
        //
    }
}
