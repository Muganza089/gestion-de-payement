<?php require_once "head.php"; ?>
<?php require_once "header.php"; ?>

<body>
    <div class="container mt-5">
        <ul>
            <li><a href="index.php?action=searchBar">Rechercher un étudiant</a></li>
            <li><a href="index.php?action=listStudentsPaid">Étudiants ayant payé</a></li>
            <li><a href="index.php?action=listStudentsUnpaid">Étudiants n'ayant pas payé</a></li>
        </ul>

        <div class="row">
            <div class="col-md-3">
                <?php require_once "ajouterEtudiant.php" ?>
            </div>
            <div class="col">
                        <h2>Modifier Montant des Tranches</h2>
                    <form action="index.php?action=updateTranche" method="post">
                        <div class="form-group">
                            <label for="tranche">Sélectionnez une tranche :</label>
                            <select id="tranche" name="idtranche" class="form-control" required>
                                <?php
                                // Assurez-vous de remplacer cette partie par votre propre logique pour récupérer les tranches de la base de données
                                require_once 'models/Tranche.php';
                                $trancheModel = new Tranche();
                                $tranches = $trancheModel->getAllTranches();

                                foreach ($tranches as $tranche) {
                                    echo '<option value="' . $tranche['idtranche'] . '">' . $tranche['nomtranche'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount">Nouveau montant :</label>
                            <input type="number" id="amount" name="amounttranche" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-warning">Modifier</button>
                    </form>
            </div>
            <div class="col-md-3">
                <h3>Recharger de l'argent</h3>
                <form action="index.php?action=addMoney" class="form" method="post">
                    <div class="form-group">
                        <label>Étudiant:</label>
                        <select name="etudiant_id" class="form-control" required>
                            <?php foreach ($data['etudiants'] as $etudiant): ?>
                                <option value="<?= $etudiant['id'] ?>"><?= $etudiant['nom'] . ' ' . $etudiant['postnom'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Montant:</label>
                        <input type="number" name="amount" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Recharger</button>
                </form>
            </div>
        </div>
        <div class="row">

                                
            <div class="col-md">
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
                                    <th>Annee</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['etudiants'] as $etudiant): ?>
                                    <tr>
                                        <td><?= $etudiant['matricule'] ?></td>
                                        <td><?= $etudiant['nom'] ?></td>
                                        <td><?= $etudiant['postnom'] ?></td>
                                        <?php $dateInt = (int) $etudiant['year'];
                                        $dateInt+=1;
                                        
                                        ?>
                                        <td><?= $etudiant['promotion'] ?></td>
                                 
                                        <td><?= $etudiant['year']." - ".$dateInt ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</body>
</html>
