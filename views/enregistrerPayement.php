<?php require_once "head.php"; ?>
<?php require_once "header.php"; ?>

<body>
    <div class="form-container">
        <h2>Enregistrer un paiement</h2>
        <form action="index.php?action=createPayment" class="form" method="post" id="paymentForm">
            <div class="form-group">
                <label>Tranche:</label>
                <select name="tranche" class="form-control" id="trancheSelect" required>
                    <option value="1" data-amount="350">Tranche 1</option>
                    <option value="2" data-amount="510">Tranche 2</option>
                    <option value="3" data-amount="140">Tranche 3</option>
                </select>
            </div>
            <div class="form-group">
                <label>Montant:</label>
                <input type="number" name="montant" id="montantInput" class="form-control" value="200" readonly required>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
        </form>
    </div>

    <script>
        document.getElementById('trancheSelect').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var amount = selectedOption.getAttribute('data-amount');
            document.getElementById('montantInput').value = amount;
        });
    </script>
</body>
</html>
