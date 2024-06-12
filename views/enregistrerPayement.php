<?php require_once "head.php"; ?>
<?php require_once "header.php"; ?>


<body>

                <div class="form-container">
                <h2>Enregistrer un paiement</h2>
                <form action="index.php?action=createPayment" class="form " method="post">
                    
                    <div class="form-group">
                        <label>Tranche:</label>
                        <input type="number" name="tranche" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Montant:</label>
                        <input type="number" name="montant" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </form>
                </div>
</body>
</html>