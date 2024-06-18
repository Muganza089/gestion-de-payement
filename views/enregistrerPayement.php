<?php require_once "head.php"; ?>
<?php require_once "header.php"; ?>

<body>
    <div class="form-container">
        <h2>Enregistrer un paiement</h2>
        <form action="index.php?action=createPayment" class="form" method="post">
            <div class="form-group">
                <label>Tranche:</label>
                <select name="tranche" class="form-control" required>
                    <option value="1">Tranche 1</option>
                    <option value="2">Tranche 2</option>
                    <option value="3">Tranche 3</option>
                </select>
            </div>
            <div class="form-group">
                <label>Montant:</label>
                <select name="tranche" class="form-control" required>
                    <option value="1">Tranche 1</option>
                    <option value="2">Tranche 2</option>
                    <option value="3">Tranche 3</option>
                </select>
                <input type="number" name="montant" class="form-control" value="250" readonly required>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
        </form>
    </div>
</body>
</html>
