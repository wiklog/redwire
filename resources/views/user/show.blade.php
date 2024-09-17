<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Absences utilisateurs</title>
</head>
<body>
<a class="flex justify-center ml-2 mt-2 p-2 px-5 w-min rounded bg-gray-400 duration-300 hover:bg-gray-800 hover:text-white hover:mt-4" href="{{ route('user.index') }}">Retour</a>
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
</body>
</html>

