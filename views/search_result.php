<?php if (isset($etudiant) && is_array($etudiant)): ?>
    <h2>Informations de l'étudiant</h2>
    <p>Matricule: <?= $etudiant['matricule'] ?></p>
    <p>Nom: <?= $etudiant['nom'] ?></p>
    <p>Postnom: <?= $etudiant['postnom'] ?></p>
    <p>Promotion: <?= $etudiant['promotion'] ?></p>
    <!-- Autres informations si nécessaires -->
<?php else: ?>
    <p>Aucun étudiant trouvé avec ce matricule.</p>
<?php endif; ?>