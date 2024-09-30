@extends('layouts.app')

@section('content')
<form action="{{ route('absence.store') }}" method="post">
    @csrf

    <div class="mb-3">
        <label for="motif" class="">{{ __('Choose a reason') }}</label><br>

        <select class="border" name="motif">
            <option value="">{{ __('Please, choose a reason') }}</option>
            @foreach (Auth::user()->isA('admin') ? $motifs : $motifs->where('is_accessible_salarie', 1) as $motif)
                <option @if(old('motif') == $motif->id) selected @endif value="{{ $motif->id }}">{{ $motif->titre }}</option>
            @endforeach
        </select>
        @error("motif")
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="user" class="">{{ __('Choose a user') }}</label><br>

        <select class="border" name="user">
            <option value="">{{ __('Please, choose a user') }}</option>
            @foreach (Auth::user()->isA('admin') ? $users : [Auth::user()] as $user)
                <option @if(old('user') == $user->id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        @error("user")
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="debut" class="">{{ __('Start absence date') }}</label><br>

        <input type="date" class="" name="debut" value="{{ old('debut') }}">
        @error("debut")
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="fin" class="">{{ __('End absence date') }}</label><br>

        <input type="date" class="" name="fin" value="{{ old('fin')}}">
        @error("fin")
            <p>{{ $message }}</p>
        @enderror
    </div>
    @if(auth()->user()->isA('admin'))
        <div class="mb-3">
            <input type="hidden" name="status" value="validate" readonly>
            @error("status")
                <p>{{ $message }}</p>
            @enderror
        </div>
    @else
        <div class="mb-3">
            <input type="hidden" name="status" value="pending" readonly>
            @error("status")
                <p>{{ $message }}</p>
            @enderror
        </div>
    @endif

    <button type="submit" class="">{{ __('Create') }}</button>

</form>
@endsection
