<h1>Modification d'une absence de '{{ $oldname }}'</h1>

<p>Bonjour,<br> Nous vous informons que l'absence '{{ $oldtitre }}' à été modifié et remplacé par '{{ $absence->motif->titre }}'</p>

<strong>Anciennes informations</strong>
<p><em>Utilisateur titulaire de l'absence :</em> {{ $oldname }}</p>
<p><em>Motif de l'absence :</em> {{ $oldtitre }}</p>
<p><em>Date de debut de l'absence :</em> {{ $olddebut }}</p>
<p><em>Date de fin de l'absence :</em> {{ $oldfin }}</p>

<strong>Nouvelles informations</strong>
<p><em>Utilisateur titulaire de l'absence :</em> {{ $absence->user->name }}</p>
<p><em>Motif de l'absence :</em> {{ $absence->motif->titre }}</p>
<p><em>Date de debut de l'absence :</em> {{ $absence->date_debut }}</p>
<p><em>Date de fin de l'absence :</em> {{ $absence->date_fin }}</p>
