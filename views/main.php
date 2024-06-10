<?php require_once "head.php"; ?>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Gestion des paiements académiques</h1>

        <div class="row">
            <div class="col-md-6">
                <?php require_once "ajouterEtudiant.php" ?>
            </div>
            
                <?php /*require_once "enregistrerPayement.php";*/?>
        </div>

        <h2 class="mt-5 text-center">Liste des étudiants</h2>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Postnom</th>
                            <th>Promotion</th>
                            <th>Tranche 1</th>
                            <th>Tranche 2</th>
                            <th>Tranche 3</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data['etudiants'] as $etudiant):
                            // Calcul des montants payés et restants par tranche
                            $totalParTranche = 250;
                            $payments = $etudiant['payments'];
                            $tranche1 = 0;
                            $tranche2 = 0;
                            $tranche3 = 0;

                            foreach ($payments as $payment) {
                                if ($payment['tranche'] == 1) {
                                    $tranche1 += $payment['montant'];
                                } elseif ($payment['tranche'] == 2) {
                                    $tranche2 += $payment['montant'];
                                } elseif ($payment['tranche'] == 3) {
                                    $tranche3 += $payment['montant'];
                                }
                            }

                            $resteTranche1 = $totalParTranche - $tranche1;
                            $resteTranche2 = $totalParTranche - $tranche2;
                            $resteTranche3 = $totalParTranche - $tranche3;
                        ?>
                            <tr>
                                <td><?= $etudiant['matricule'] ?></td>
                                <td><?= $etudiant['nom'] ?></td>
                                <td><?= $etudiant['postnom'] ?></td>
                                <td><?= $etudiant['promotion'] ?></td>
                                <td><?= $tranche1 ?> / 250$ (reste: <?= $resteTranche1 ?>$)</td>
                                <td><?= $tranche2 ?> / 250$ (reste: <?= $resteTranche2 ?>$)</td>
                                <td><?= $tranche3 ?> / 250$ (reste: <?= $resteTranche3 ?>$)</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
