@extends('layouts.app')

@section('content')
<div class="bg-gray-200 p-px">
    <div class="w-1/2 bg-white mx-auto rounded-xl border-2 border-gray-400 p-2 mt-5 ">
        <div class="flex justify-around my-8">
            <a class="flex justify-center p-2 px-5 rounded bg-gray-400 duration-300 hover:bg-gray-800 hover:text-white" href="{{ url('/') }}">Retour</a>
            <strong class="text-4xl">Listing des utilisateurs</strong>
            <a class="flex justify-center p-2 px-5 rounded bg-green-500" href="{{ route('absence.create') }}">Créer</a>
        </div>
    <ul class="list-group">
        @forelse ($users as $user)
        <li class="list-group-item">
            <div class="flex justify-between align-items-center my-5 border rounded">
                <div class="flex gap-6">
                    <div class='min-w-40 my-auto text-center'>{{ $user->name}}</div>
                </div>
                <a class="flex justify-center gap-2 p-2 px-5 rounded bg-blue-300" href="{{ route('user.show', $user->id) }}">Détail</a>

            </div>
        </li>
        @empty
        <li class="list-group-item">
            {{ __('Aucun user connu')}}
        </li>
        @endforelse
    </ul>
</div>
@endsection
