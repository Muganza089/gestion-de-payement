<?php require_once "head.php"; ?>
<?php require_once "header.php"; ?>
<?php if ($etudiant): ?>
    <h2>Informations de l'étudiant</h2>
    <p>Matricule: <?= $etudiant['matricule'] ?></p>
    <p>Nom: <?= $etudiant['nom'] ?></p>
    <p>Prénom: <?= $etudiant['prenom'] ?></p>
    <!-- Autres informations -->
<?php else: ?>
    <p>Aucun étudiant trouvé avec ce matricule.</p>
<?php endif; ?>
