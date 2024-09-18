@extends('layouts.app')

@section('content')
<form action="{{ route('motif.update', $motif) }}" method="post">
    @csrf
    @method("PUT")

    <div class="mb-3">
        <label for="titre" class="">Titre du Motif</label>

        <input type="text" autofocus class="border" name="titre" value="{{ $motif->titre }}">
        @error("titre")
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="is_accessible" class="">Est-il accessible aux salariers?</label><br>

        <label for="radio_oui">Oui</label>
        <input type="radio" checked="{{ $motif->is_accessible_salarie }}" value="1" name="is_accessible"><br>
        <label for="radio_non">Non</label>
        <input type="radio" checked="{{ $motif->is_accessible_salarie }}" value="0" name="is_accessible">

        @error("is_accessible")
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="">Sauvegarder</button>

</form>
@endsection
