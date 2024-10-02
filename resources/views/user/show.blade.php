@extends('layouts.app')

@section('content')
    <a class="flex justify-center ml-2 mt-2 p-2 px-5 w-min rounded bg-gray-400 duration-300 hover:bg-gray-800 hover:text-white hover:mt-4" href="{{ route('user.index') }}">{{ __('Back') }}</a>
    <p class="flex justify-center text-4xl">{{ __('Absences of') }} {{ $user->name }}</p>
    <p class="flex justify-center italic">{{ __('Email address') }}: {{ $user->email }}</p>

    <ul class="list-group">
        <section class="flex justify-center grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($absences as $absence)
                <div class=" bg-white mx-auto p-2 mt-5 min-w-96 max-w-96 border-2 rounded ">
                    <div class="mb-3">
                        <strong>{{ __('Reason for absence') }}:</strong> {{ $absence->motif->titre }}
                    </div>
                    <div class="mb-3">
                        <strong>{{ __('Start date') }}:</strong> {{ $absence->date_debut }}
                    </div>
                    <div class="mb-3">
                        <strong>{{ __('End date') }}:</strong> {{ $absence->date_fin }}
                    </div>
                </div>
            @empty
                <li class="list-group-item">
                    {{ __('Unknown absence') }}
                </li>
            @endforelse
        </section>
    </ul>
@endsection
