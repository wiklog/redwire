@extends('layouts.app')

@section('content')
<form action="{{ route('absence.update', $absence) }}" method="post" class="max-w-lg mx-auto p-6 mt-20 bg-white rounded-lg shadow-md">
    @csrf
    @method("PUT")

    <div class="mb-4">
        <label for="motif" class="block text-gray-700 font-semibold">{{ __('Choose a reason') }}</label>
        <select class="border border-gray-300 rounded p-2 w-full" name="motif">
            <option value="{{ $absence->motif->id }}">{{ $absence->motif->titre }}</option>
            @foreach ($motifs as $motif)
                <option value="{{ $motif->id }}">{{ $motif->titre }}</option>
            @endforeach
        </select>
        @error("titre")
            <p class="text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="user" class="block text-gray-700 font-semibold">{{ __('Choose a user') }}</label>
        <select class="border border-gray-300 rounded p-2 w-full" name="user">
            <option value="{{ $absence->user->id }}">{{ $absence->user->name }}</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        @error("user")
            <p class="text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="debut" class="block text-gray-700 font-semibold">{{ __('Start absence date') }}</label>
        <input type="date" class="border border-gray-300 rounded p-2 w-full" value="{{ $absence->date_debut }}" name="debut">
        @error("debut")
            <p class="text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="fin" class="block text-gray-700 font-semibold">{{ __('End absence date') }}</label>
        <input type="date" class="border border-gray-300 rounded p-2 w-full" value="{{ $absence->date_fin }}" name="fin">
        @error("fin")
            <p class="text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="mt-4 w-full bg-blue-500 text-white font-semibold py-2 rounded hover:bg-blue-600">
        {{ __('Save') }}
    </button>
</form>
@endsection
