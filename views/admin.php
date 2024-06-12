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
            <div class="col-md-6">
                <?php require_once "ajouterEtudiant.php" ?>
            </div>
            <div class="col-md-6">
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data['etudiants'] as $etudiant):
                 
                        ?>
                            <tr>
                                <td><?= $etudiant['matricule'] ?></td>
                                <td><?= $etudiant['nom'] ?></td>
                                <td><?= $etudiant['postnom'] ?></td>
                                <td><?= $etudiant['promotion'] ?></td>
                             
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
            </div>



            
                <?php /*require_once "enregistrerPayement.php";*/?>
        </div>

        
    </div>
</body>
</html>
