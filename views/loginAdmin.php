<?php require_once "head.php"; ?>
<?php require_once "header.php"; ?>
<body>
    <div class="form-container">
        <h2>Login Administrateur</h2>
        <form action="index.php?action=connectAdmin" class="form" method="post">
            <div class="form-group">
                <label>Nom:</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Mot de passe:</label>
                <input type="password" name="motDePasse" class="form-control" required>
            </div>
            <input type="hidden" name="action" value="login">
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
</body>
</html>
