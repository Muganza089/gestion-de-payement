<?php
class Payment extends Model {
    public function getPaymentsByEtudiant($etudiant_id) {
        $query = "SELECT * FROM payments WHERE etudiant_id=:etudiant_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['etudiant_id' => $etudiant_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createPayment($data) {
        $query = "INSERT INTO payments SET etudiant_id=:etudiant_id, tranche=:tranche, montant=:montant";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }
}

