<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Absences</title>
</head>
<body>
    <a class="flex justify-center ml-2 mt-2 p-2 px-5 w-min rounded bg-gray-400 duration-300 hover:bg-gray-800 hover:text-white hover:mt-4" href="{{ url('/') }}">Retour</a>
    <div class="w-4/6 bg-white mx-auto p-2 mt-5 ">
        <ul class="list-group">
            @forelse ($absences as $absence)
            <li class="list-group-item">
                <div class="flex justify-between align-items-center my-5 border rounded">
                    <div class="flex gap-6">
                        <div class='min-w-60 my-auto text-center'>{{ $absence->motif->titre}}</div>
                        <div class='min-w-60 my-auto text-center'>{{ $absence->date_debut }}</div>
                        <div class='min-w-60 my-auto text-center'>{{ $absence->user->lastname}}</div>
                    </div>
                    <div class="flex justify-center gap-2 p-2 px-5 rounded bg-blue-300">
                        <a href="{{ route('absence.show', $absence->id) }}">Détail</a>
                    </div>
                </div>
            </li>
            @empty
            <li class="list-group-item">
                {{ __('Aucun absence connu')}}
            </li>
            @endforelse
        </ul>
    </div>
</body>
</html>
