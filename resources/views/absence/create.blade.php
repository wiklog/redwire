@extends('layouts.app')

@section('content')
<form action="{{ route('absence.store') }}" method="post">
    @csrf

    <div class="mb-3">
        <label for="titre" class="">Choisir le motif</label><br>

        <select class="border" name="motif">
            <option value="motif">Veuillez choisir un motif</option>
            @foreach ($motifs as $motif)
                <option value="{{ $motif->id }}">{{ $motif->titre }}</option>
            @endforeach
        </select>
        @error("titre")
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="titre" class="">Choisir l'utilisateur</label><br>

        <select class="border" name="user">
            <option value="user">Veuillez choisir un utilisateur</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->lastname }} {{ $user->firstname }}</option>
            @endforeach
        </select>
        @error("user")
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="debut" class="">Date du début de l'absence</label><br>

        <input type="date" class="" name="debut">
        @error("debut")
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="fin" class="">Date de fin de l'absence</label><br>

        <input type="date" class="" name="fin">
        @error("fin")
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="">Créer</button>

</form>
@endsection
