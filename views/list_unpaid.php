<?php require_once "head.php"; ?>

<body>
    <?php require_once 'header.php'; ?>
    <div class="container">
        <h2>Étudiants insolvables</h2>
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
                            <td><?php echo htmlspecialchars($student['id']); ?></td>
                            <td><?php echo htmlspecialchars($student['matricule']); ?></td>
                            <td><?php echo htmlspecialchars($student['nom']); ?></td>
                            <td><?php echo htmlspecialchars($student['postnom']); ?></td>
                            <td><?php echo htmlspecialchars($student['promotion']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun étudiant insolvable jusque la.</p>
        <?php endif; ?>
    </div>
</body> 
</html>

