<?php

namespace App\Http\Controllers;

use App\Models\Motif;
use Illuminate\Http\Request;

class MotifController extends Controller
{
    public function index()
    {
        $motifs = Motif::all();
        return view('motif.index', compact('motifs'));
    }

    public function create()
    {
        Motif::all();
        return view('motif.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $motif = new motif();

        $motif->titre = $data['titre'];
        $motif->is_accessible_salarie = $data['is_accessible'];

        $motif->save();

        $motifs = Motif::all();
        return redirect()->route('motif.index', compact( 'motifs'));
    }

    public function show(Motif $motif)
    {
        //
    }

    public function edit(Motif $motif)
    {
        return view('motif.edit', compact('motif'));
    }

    public function update(Request $request, Motif $motif)
    {
        $data = $request->all();
        $motif->titre = $data['titre'];
        $motif->is_accessible_salarie = $data['is_accessible'];

        $motif->save();

        $motifs = Motif::all();
        return redirect()->route('motif.index', compact( 'motifs'));
    }

    public function destroy(Motif $motif)
    {
        $motif->delete();
        $motifs = Motif::all();
        return redirect()->route('motif.index', compact( 'motifs'));
    }
}
