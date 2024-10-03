<h1>Restauration du motif '{{ $motif->titre }}'</h1>

<p>Bonjour,<br> Nous vous informons que le motif '{{ $motif->titre }}' à été Restauré</p>
<strong>Informations</strong>

<p><em>Titre du motif :</em> {{ $motif->titre }}</p>
<p><em>Accessible par les salariés :</em> {{ $motif->is_accessible_salarie ? 'oui' : 'non' }}</p>
