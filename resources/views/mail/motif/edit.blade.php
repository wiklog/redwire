<h1>Modification du motif '{{ $oldtitre }}'</h1>

<p>Bonjour,<br> Nous vous informons que le motif '{{ $oldtitre }}' à été modifié et remplacé par '{{ $motif->titre }}'</p>
<strong>Anciennes informations</strong>

<p><em>Titre du motif :</em> {{ $oldtitre }}</p>
<p><em>Accessible par les salariés :</em> {{ $oldaccessible ? 'oui' : 'non' }}</p>

<strong>Nouvelles informations</strong>
<p><em>Titre du motif :</em> {{ $motif->titre }}</p>
<p><em>Accessible par les salariés :</em> {{ $motif->is_accessible_salarie ? 'oui' : 'non' }}</p>
