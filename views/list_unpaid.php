<?php require_once "head.php"; ?>
<?php require_once "header.php"; ?>
<h2>Étudiants n'ayant pas payé</h2>
<ul>
    <?php foreach ($students as $student): ?>
        <li><?= $student['nom'] . ' ' . $student['prenom'] . ' (' . $student['matricule'] . ')' ?></li>
    <?php endforeach; ?>
</ul>
