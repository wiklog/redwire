@extends('layouts.app')

@section('content')
<div class="bg-gray-200 p-px">
    <div class="w-4/6 bg-white mx-auto rounded-xl border-2 border-gray-400 p-2 mt-5 ">
        <div class="flex justify-around my-8">
            <a class="flex justify-center p-2 px-5 rounded bg-gray-400 duration-300 hover:bg-gray-800 hover:text-white" href="{{ url('/') }}">Retour</a>
            <strong class="text-4xl">Listing des motifs</strong>
            <a class="flex justify-center p-2 px-5 rounded bg-green-500" href="{{ route('motif.create') }}">Créer</a>
        </div>
        <ul class="list-group">
            @forelse ($motifs as $motif)
            <li class="list-group-item">
                <div class="flex justify-between align-items-center my-5 border rounded">
                    <div class="flex gap-6">
                        <div class='min-w-60 my-auto text-center'>{{ $motif->titre}}</div>
                        <div class='min-w-60 my-auto text-center'>{{ $motif->is_accessible_salarie }}</div>
                    </div>
                    <div class="flex gap-2">
                        <a class="flex justify-center gap-2 p-2 px-5 rounded bg-blue-300" href="{{ route('motif.show', $motif) }}">Détail</a>
                        <a class="flex justify-center gap-2 p-2 px-5 rounded bg-orange-300" href="{{ route('motif.edit', $motif) }}">Modifier</a>
                        @if ($motif->deleted_at === null)
                            <form action="{{ route('motif.destroy', $motif) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex justify-center gap-2 p-2 px-5 rounded bg-red-300">Supprimer</button>
                            </form>
                        @else
                            <form action="{{ route('motif.restore', $motif) }}" method="post">
                                @csrf
                                @method('GET')

                                <button type="submit" class="flex justify-center gap-2 p-2 px-5 rounded bg-lime-300">Restaurer</button>
                            </form>
                        @endif

                    </div>

                </div>
            </li>
            @empty
                {{ __('Aucun motif connu')}}
            @endforelse
        </ul>
    </div>
</div>
@endsection
