<div class=" bg-white mx-auto p-2 mt-5 max-w-96 border-2 rounded ">
    <ul class="list-group">
        @forelse ($users as $user)
        <li class="list-group-item">
            <div class="sm:flex justify-between align-items-center">
                <div class="flex gap-6">
                    <div class='min-w-40 text-center'>{{ $user->lastname}}</div>
                    <div class='min-w-40 text-center'>{{ $user->firstname }}</div>
                </div>
                <div class="flex justify-center gap-2">
                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary">Détail</a>
                </div>
            </div>
        </li>
        @empty
        <li class="list-group-item">
            {{ __('Aucun user connu')}}
        </li>
        @endforelse
    </ul>
</div>
