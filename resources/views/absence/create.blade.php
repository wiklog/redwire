@extends('layouts.app')

@section('content')
<form action="{{ route('absence.store') }}" method="post">
    @csrf

    <div class="mb-3">
        <label for="titre" class="">Choisir le motif</label><br>

        <select class="border" name="motif">
            <option value="motif">Veuillez choisir un motif</option>
            @foreach ($motifs as $motif)
                <option @if(old('motif') == $motif->id) selected @endif value="{{ $motif->id }}">{{ $motif->titre }}</option>
            @endforeach
        </select>
        @error("titre")
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="titre" class="">Choisir l'utilisateur</label><br>

        <select class="border" name="user">
            <option value="{{ old('user') }}">Veuillez choisir un user</option>
            @foreach ($users as $user)
                <option @if(old('user') == $user->id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        @error("user")
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="debut" class="">Date du début de l'absence</label><br>

        <input type="date" class="" name="debut" value="{{ old('debut') }}">
        @error("debut")
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="fin" class="">Date de fin de l'absence</label><br>

        <input type="date" class="" name="fin" value="{{ old('fin')}}">
        @error("fin")
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="">Créer</button>

</form>
@endsection
