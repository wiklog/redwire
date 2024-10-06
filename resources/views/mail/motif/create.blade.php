<h1>Création d'un motif '{{ $motif->titre }}'</h1>

<p>Bonjour,<br> Nous vous informons de l'ajout du motif '{{ $motif->titre }}'</p>

<strong>Informations</strong>
<p><em>Titre du motif :</em> {{ $motif->titre }}</p>
<p><em>Accessible par les salariés :</em> {{ $motif->is_accessible_salarie ? 'oui' : 'non' }}</p>
