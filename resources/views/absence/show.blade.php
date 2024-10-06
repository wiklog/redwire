@extends('layouts.app')

@section('content')
    <a class="flex justify-center ml-2 mt-2 p-2 px-5 w-min rounded bg-gray-400 duration-300 hover:bg-gray-800 hover:text-white hover:mt-4" href="{{ route('absence.index') }}">Retour</a>
    <div class=" bg-white mx-auto p-2 mt-5 max-w-96 border-2 rounded ">

        <div class="mb-3">
            <strong>{{ __('Start date') }}:</strong> {{ $absence->date_debut }}
        </div>
        <div class="mb-3">
            <strong>{{ __('End date') }}:</strong> {{ $absence->date_fin }}
        </div>
        <div class="mb-3">
            <strong>{{ __('Employee name') }}:</strong> {{ $absence->user->name }}
        </div>
        <div class="mb-3">
            <strong>{{ __('Absence reason') }}:</strong> {{ $absence->motif->titre }}
        </div>
    </div>
@endsection

