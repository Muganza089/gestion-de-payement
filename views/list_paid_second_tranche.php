<?php require_once "head.php"; ?>

<body>
    <?php require_once 'header.php'; ?>
    <div class="container">
        <h2>Étudiants ayant payé</h2>
        <?php if (!empty($students)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Matricule</th>
                        <th>Nom</th>
                        <th>Postnom</th>
                        <th>Promotion</th>
                        <th>Tranche</th>
                        <th>Montant</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student): ?>
                        <tr>
                        <?php //if ($student['tranche']==2): ?>
                            <td><?php echo htmlspecialchars($student['id']); ?></td>
                            <td><?php echo htmlspecialchars($student['matricule']); ?></td>
                            <td><?php echo htmlspecialchars($student['nom']); ?></td>
                            <td><?php echo htmlspecialchars($student['postnom']); ?></td>
                            <td><?php echo htmlspecialchars($student['promotion']); ?></td>
                            <td><?php echo htmlspecialchars($student['tranche']); ?></td>
                            <td><?php echo htmlspecialchars($student['montant']); ?></td>
                            <?php //endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun étudiant n'a payé pour l'instant.</p>
        <?php endif; ?>
    </div>
</body> 
</html>

