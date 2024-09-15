<ul class="list-group">
    @forelse ($absences as $absence)
            <li class="list-group-item">
                <div class="sm:flex justify-between items-center">
                    <div class="flex gap-6">
                        <div class='min-w-40 text-center'>{{ $absence->motif->titre }}</div>
                        <div class='min-w-40 text-center'>{{ $absence->date_debut }}</div>
                        <div class='min-w-40 text-center'>{{ $absence->date_fin }}</div>
                    </div>
                </div>
            </li>
    @empty
        <li class="list-group-item">
            {{ __('Aucune absence connue')}}
        </li>
    @endforelse
</ul>
