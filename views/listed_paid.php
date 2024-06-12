<?php require_once "heade.php"; ?>
<?php require_once "header.php"; ?>
<h2>Étudiants ayant payé</h2>
<ul>
    <?php foreach ($students as $student): ?>
        <li><?= $student['nom'] . ' ' . $student['prenom'] . ' (' . $student['matricule'] . ')' ?></li>
    <?php endforeach; ?>
</ul>
