@extends('layouts.app')

@section('content')
<div class="bg-gray-200 p-px">
    <div class="w-4/6 bg-white mx-auto rounded-xl border-2 border-gray-400 p-2 mt-5">
        <div class="flex justify-around my-8">
            <a class="flex justify-center p-2 px-5 rounded bg-gray-400 duration-300 hover:bg-gray-800 hover:text-white" href="{{ url('/dashboard') }}">{{ __('Back') }}</a>
            <strong class="text-4xl">{{ __('Reasons listing') }}</strong>
            @can('motif-create')
                <a class="flex justify-center p-2 px-5 rounded bg-green-500" href="{{ route('motif.create') }}">{{ __('Create') }}</a>
            @endcan
        </div>
        <ul class="list-group">
            @forelse ($motifs as $motif)
                @if (Auth::user()->isA('admin') || $motif->is_accessible_salarie == 1)
                    <li class="list-group-item">
                        <div class="flex justify-between align-items-center my-5 border rounded">
                            <div class="flex gap-6">
                                <div class='min-w-60 my-auto text-center'>{{ $motif->titre }}</div>

                                @if (Auth::user()->isA('admin'))
                                    <div class='min-w-60 my-auto text-center'>
                                        {{ $motif->is_accessible_salarie == 1 ? __('Accessible') : __('Not accessible') }}
                                    </div>
                                @endif
                            </div>
                            <div class="flex gap-2">
                                @if ($motif->deleted_at === null)
                                    @can('motif-edit')
                                        <a class="flex justify-center gap-2 p-2 px-5 rounded bg-orange-300" href="{{ route('motif.edit', $motif) }}">{{ __('Edit') }}</a>
                                    @endcan
                                    @can('motif-delete')
                                        <form action="{{ route('motif.destroy', $motif) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="flex justify-center gap-2 p-2 px-5 rounded bg-red-300">{{ __('Delete') }}</button>
                                        </form>
                                    @endcan
                                @else
                                    @can('motif-delete')
                                        <form action="{{ route('motif.restore', $motif) }}" method="post">
                                            @csrf
                                            @method('GET')

                                            <button type="submit" class="flex justify-center gap-2 p-2 px-5 rounded bg-purple-300">{{ __('Restore') }}</button>
                                        </form>
                                    @endcan
                                @endif
                            </div>
                        </div>
                    </li>
                @endif
            @empty
                {{ __('Unknown reason') }}
            @endforelse
        </ul>
    </div>
</div>
@endsection
