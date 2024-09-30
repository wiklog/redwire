@extends('layouts.app')

@section('content')
<form action="{{ route('absence.update', $absence) }}" method="post">
    @csrf
    @method("PUT")

    <div class="mb-3">
        <label for="titre" class="">{{ __('Choose a reason') }}</label><br>

        <select class="border" name="motif">
            <option value="{{ $absence->motif->id }}">{{ $absence->motif->titre }}</option>
            @foreach ($motifs as $motif)
                <option value="{{ $motif->id }}">{{ $motif->titre }}</option>
            @endforeach
        </select>
        @error("titre")
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="user" class="">{{ __('Choose a user') }}</label><br>

        <select class="border" name="user">
            <option value="{{ $absence->user->id }}">{{ $absence->user->name }}</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        @error("user")
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="debut" class="">{{ __('Start absence date') }}</label><br>

        <input type="date" class="" value="{{ $absence->date_debut }}" name="debut">
        @error("debut")
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="fin" class="">{{ __('End absence date') }}</label><br>

        <input type="date" class="" value="{{ $absence->date_fin }}" name="fin">
        @error("fin")
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="">{{ __('Save') }}</button>

</form>
@endsection
