<?php require_once "head.php"; ?>
<?php require_once "header.php"; ?>
<body>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2>Bienvenue sur notre plateforme</h2>
                <div class="btn-group mt-4" role="group">
                    <a href="index.php?action=loginStudent" class="btn btn-primary">Se connecter en tant qu'Étudiant</a>
                    <a href="index.php?action=loginAdmin" class="btn btn-secondary">Se connecter en tant qu'Administrateur</a>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <img src="/assets/images/image1.png" alt="Paiement des étudiants" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <img src="/assets/images/image2.jpg" alt="Paiement des étudiants" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
