@extends('layouts.app')

@section('content')
<div class="bg-gray-200 p-px">
    <a class="flex justify-center ml-2 mt-2 p-2 px-5 w-min rounded bg-gray-400 duration-300 hover:bg-gray-800 hover:text-white hover:mt-4" href="{{ url('/') }}">Retour</a>
    <div class="w-4/6 bg-white mx-auto rounded-xl border-2 border-gray-400 p-2 mt-5 ">
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
                        <form action="{{ route('motif.destroy', $motif) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex justify-center gap-2 p-2 px-5 rounded bg-red-300">Supprimer</button>
                        </form>
                    </div>

                </div>
            </li>
            @empty
                {{ __('Aucun motif connu')}}
            @endforelse
        </ul>
    </div>
</div>
<a href="{{ route('motif.create') }}">Créer</a>
@endsection
