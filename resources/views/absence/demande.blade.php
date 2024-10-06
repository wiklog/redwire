@extends('layouts.app')

@section('content')
    <div class="bg-gray-200 p-px">
        <div class="w-4/6 bg-white mx-auto rounded-xl border-2 border-gray-400 p-2 mt-5 ">
            <div class="flex justify-around my-8">
                <strong class="text-4xl">{{ __("Requests list") }}</strong>
            </div>
            <ul class="list-group">
            @php
                $absencesPending = $absences->where('status', 'pending');
                $userAdmin = Auth::user()->isA('admin') ? $absencesPending : $absencesPending->where('user_id', Auth::user()->id);
            @endphp

                @forelse ($userAdmin as $absence)
                <li class="list-group-item">
                    <div class="flex justify-between align-items-center my-5 border rounded">
                        <div class="flex">
                            <div class='min-w-52 my-auto text-center'>{{ $absence->motif->titre}}</div>
                            <div class='min-w-52 my-auto text-center'>{{ $absence->date_debut }}</div>
                            <div class='min-w-52 my-auto text-center'>{{ $absence->user->name}}</div>
                            <div class='min-w-52 my-auto text-center'>{{ __($absence->status) }}</div>
                        </div>
                        <div class="flex gap-2">
                            <form action="{{ route('absence.status', $absence) }}" method="post">
                                @csrf
                                @method('get')
                                <input type="hidden" name="status" value="validate">
                                <button type="submit" class="flex justify-center gap-2 p-2 px-5 rounded bg-green-300">{{ __("Validate") }}</button>
                            </form>

                            <form action="{{ route('absence.status', $absence) }}" method="post">
                                @csrf
                                @method('get')
                                <input type="hidden" name="status" value="reject">
                                <button type="submit" class="flex justify-center gap-2 p-2 px-5 rounded bg-red-300">{{ __("Reject") }}</button>
                            </form>
                        </div>
                    </div>
                </li>
                @empty
                    {{ __('Unknown absence')}}
                @endforelse
            </ul>
        </div>
    </div>
@endsection
