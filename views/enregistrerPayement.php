<?php require_once "head.php"; 
 session_start();
?>

<body>

                <div class="form-container">
                <h2>Enregistrer un paiement</h2>
                <form action="../public/actions.php" class="form " method="post">
                    <input type="hidden" name="action" value="createPayment">
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