<?php require_once "head.php"; ?>
<?php require_once "header.php"; ?>
<body>

                <form action="index.php?action=createStudent" method="post">
                <h2>Ajouter un étudiant</h2>
                    <input type="hidden" name="action" value="createEtudiant">
                    <div class="form-group">
                        <label>Matricule:</label>
                        <input type="text" id="matricule" name="matricule" class="form-control" pattern=".{10,}" title="Le matricule doit comporter au moins 10 caractères" required>
                    </div>
                    <div class="form-group">
                        <label>Nom:</label>
                        <input type="text" name="nom" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Postnom:</label>
                        <input type="text" name="postnom" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Promotion:</label>
                        <input type="text" name="promotion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Mot de passe:</label>
                        <input type="password" name="motdepasse" class="form-control" required>
                    </div>
                    
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </form>
</body>
</html>
