<h1>Restauration d'une absence de '{{ $absence->user->name }}'</h1>

<p>Bonjour,<br> Nous vous informons que l'absence '{{ $absence->motif->titre }}' à été Restauré</p>

<strong>Informations</strong>
<p><em>Utilisateur titulaire de l'absence :</em> {{ $absence->user->name }}</p>
<p><em>Motif de l'absence :</em> {{ $absence->motif->titre }}</p>
<p><em>Date de debut de l'absence :</em> {{ $absence->date_debut }}</p>
<p><em>Date de fin de l'absence :</em> {{ $absence->date_fin }}</p>
<p><em>Status de l'absence :</em> {{ $absence->status }}</p>
