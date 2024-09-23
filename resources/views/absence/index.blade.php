@extends('layouts.app')

@section('content')
    <div class="bg-gray-200 p-px">
        <div class="w-4/6 bg-white mx-auto rounded-xl border-2 border-gray-400 p-2 mt-5 ">
            <div class="flex justify-around my-8">
                <a class="flex justify-center p-2 px-5 rounded bg-gray-400 duration-300 hover:bg-gray-800 hover:text-white" href="{{ url('/') }}">Retour</a>
                <strong class="text-4xl">Listing des absences</strong>
                @can('absence-create')
                    <a class="flex justify-center p-2 px-5 rounded bg-green-500" href="{{ route('absence.create') }}">Créer</a>
                @endcan
            </div>
            <ul class="list-group">
                @forelse ($absences as $absence)
                <li class="list-group-item">
                    <div class="flex justify-between align-items-center my-5 border rounded">
                        <div class="flex">
                            <div class='min-w-60 my-auto text-center'>{{ $absence->motif->titre}}</div>
                            <div class='min-w-60 my-auto text-center'>{{ $absence->date_debut }}</div>
                            <div class='min-w-60 my-auto text-center'>{{ $absence->user->name}}</div>
                        </div>
                        <div class="flex gap-2">
                            @if ($absence->deleted_at === null)
                                @can('absence-show')
                                    <a class="flex justify-center gap-2 p-2 px-5 rounded bg-blue-300" href="{{ route('absence.show', $absence) }}">Détail</a>
                                @endcan
                                @can('absence-edit')
                                    <a class="flex justify-center gap-2 p-2 px-5 rounded bg-orange-300" href="{{ route('absence.edit', $absence) }}">Modifier</a>
                                @endcan
                                @can('absence-delete')
                                    <form action="{{ route('absence.destroy', $absence) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex justify-center gap-2 p-2 px-5 rounded bg-red-300">Supprimer</button>
                                    </form>
                                @endcan

                            @else
                            @can('absence-delete')
                                <form action="{{ route('absence.restore', $absence) }}" method="post">
                                    @csrf
                                    @method('GET')

                                    <button type="submit" class="flex justify-center gap-2 p-2 px-5 rounded bg-purple-300">Restaurer</button>
                                </form>
                            @endcan

                            @endif
                        </div>

                    </div>
                </li>
                @empty
                    {{ __('Aucun absence connu')}}
                @endforelse
            </ul>
        </div>
    </div>
@endsection
