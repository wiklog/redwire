<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Motif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MotifController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $motifs = Motif::withTrashed()->get();

        return view('motif.index', compact('motifs'));
    }

    /**
     * Summary of create
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        Motif::all();

        return view('motif.create');
    }

    /**
     * Summary of store
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $motif = new motif();

        $motif->titre = $data['titre'];
        $motif->is_accessible_salarie = $data['is_accessible'];

        $motif->save();

        $motifs = Motif::all();

        return redirect()->route('motif.index', compact('motifs'));
    }

    /**
     * Summary of show
     * @param \App\Models\Motif $motif
     * @return void
     */
    public function show(Motif $motif)
    {
    }

    /**
     * Summary of edit
     * @param \App\Models\Motif $motif
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Motif $motif)
    {
        return view('motif.edit', compact('motif'));
    }

    /**
     * Summary of update
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Motif $motif
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Motif $motif)
    {
        $data = $request->all();
        $motif->titre = $data['titre'];
        $motif->is_accessible_salarie = $data['is_accessible'];

        $motif->save();

        $motifs = Motif::all();

        return redirect()->route('motif.index', compact('motifs'));
    }

    /**
     * Summary of destroy
     * @param \App\Models\Motif $motif
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Motif $motif)
    {
        $nb = Absence::where('motif_id', $motif->id)->count();

        if ($nb === 0) {
            $motif->delete();
        } else {
            session::put('message', "le motif est encore utilisé par {$nb} absence(s)");
        }

        $motifs = Motif::all();
        return redirect()->route('motif.index', compact('motifs'));
    }

    /**
     * Summary of restore
     * @param \App\Models\Motif $motif
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function restore(Motif $motif)
    {
        $motif->restore();
        $motifs = Motif::all();
        return redirect()->route('motif.index', compact( 'motifs'));
    }
}
