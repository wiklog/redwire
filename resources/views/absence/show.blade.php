<div class=" bg-white mx-auto p-2 mt-5 max-w-96 border-2 rounded ">

    <div class="mb-3">
        <strong>Date de début :</strong> {{ $absence->date_debut }}
    </div>
    <div class="mb-3">
        <strong>Date de fin :</strong> {{ $absence->date_fin }}
    </div>
    <div class="mb-3">
        <strong>Nom du salarié :</strong> {{ $absence->user->lastname }}
    </div>
    <div class="mb-3">
        <strong>Prenom du salarié :</strong> {{ $absence->user->firstname }}
    </div>
    <div class="mb-3">
        <strong>Motif d'absence :</strong> {{ $absence->motif->titre }}
    </div>
</div>
