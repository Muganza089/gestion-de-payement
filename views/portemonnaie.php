<?php require_once "head.php"; ?>
<?php require_once "header.php";?>
<?php require_once "models/Etudiant.php";?>

<body>
    
        <div class="row">
            <div class="col offset-3">
                <h2>Portefeuille MPESA</h2>

                <p>Solde actuel : <?php $etudiant = new Etudiant();  
                $montant = $etudiant->getAmountById($_SESSION['etudiant_id']);
                echo  $montant['porte_monnaie']  ; ?> USD</p>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <img src="assets/images/mpesalogo.png" alt="mpesa" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <img src="assets/images/OIP.jpg" alt="orange money" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col">
                <h3>Recharger de l'argent</h3>
                <form action="index.php?action=addMoney" class="form" method="post">
                    <div class="form-group">
                        <label>Montant:</label>
                        <input type="number" name="amount" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Recharger</button>
                </form>
             
            </div>
        </div>
        <div class="row">
            <div class="col offset-5">
            <a class="btn btn-primary mt-3" href="index.php?action=enregistrerPayement">Proceder au paiement</a>
                
                
            </div>
        </div>
        
        
        
    </div>
</body>
</html>
